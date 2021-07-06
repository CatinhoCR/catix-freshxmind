/* eslint-disable import/no-extraneous-dependencies */
const webpack = require('webpack')
const merge = require('webpack-merge')
const WriteFilePlugin = require('write-file-webpack-plugin')
const StyleLintPlugin = require('stylelint-webpack-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const baseConfig = require('./webpack.common.js')
const {
  HOST,
  BROWSER_SYNC_PORT,
  WEBPACK_DEV_SERVER_PORT,
  PATHS,
  HOMEDIR,
} = require('./env.config')
var fs = require('fs')
const SSLFILES = '/.config/valet/Certificates/' + HOST

/**
 * This is the development config for webpack which
 * uses auto-reloading for php and js and hot module
 * replacement for css.
 * @todo env homedir and paths host etc
 *
 * We use webpack-dev-server and browser-sync for hot
 * reloading and emit eslint and csslint messages
 * to the browser console.
 */

const hostUrl = `https://${HOST}`

const webpackConfig = merge(baseConfig, {
  mode: 'development',
  watch: true,
  devtool: 'inline-source-map',
  stats: false,

  // Turn performance hints off for dev because
  // our files are not optimized yet
  performance: { hints: false },

  // Specify the path of the /build folder for hot updates
  output: {
    publicPath: PATHS.build(),
  },

  // Enable hot reloading through webpack-dev-server
  // and proxy it to the dev host url
  devServer: {
    open: false,
    hotOnly: true,
    host: HOST,
    port: WEBPACK_DEV_SERVER_PORT,
    publicPath: PATHS.build(),
    overlay: {
      errors: true,
    },
    proxy: {
      '**': {
        target: hostUrl,
        changeOrigin: true,
        secure: false
      },
    },
    http2: true,
    https: {
      key: fs.readFileSync(HOMEDIR + SSLFILES + '.key'),
      cert: fs.readFileSync(HOMEDIR + SSLFILES + '.crt'),
    },
    stats: {
      all: false,
      colors: true,
      errors: true,
      errorDetails: true,
      warnings: true,
    },
  },

  plugins: [
    new webpack.HotModuleReplacementPlugin(),

    // Don't write .hot-update.js files to the file system
    new WriteFilePlugin({
      test: /^(?!.*(hot)).*/,
    }),

    // Show stylelint errors as warnings in the browser console
    new StyleLintPlugin({
      emitWarning: true,
    }),

    // Use browsersync to proxy webpack-dev-server
    // and add auto reloading for php and js. Reload
    // js to have a full page refresh when src file changes
    new BrowserSyncPlugin({
      open: false,
      host: HOST,
      port: BROWSER_SYNC_PORT,
      proxy: `${hostUrl}`,
      https: {
        key: HOMEDIR + SSLFILES + '.key',
        cert: HOMEDIR + SSLFILES + '.crt',
      },
      // bypass webpack-dev-server to fix webfont/cors issue
      // proxy: `${HOST}:${WEBPACK_DEV_SERVER_PORT}`,
      files: [
        `${PATHS.theme()}/**/*.php`,
        `${PATHS.src()}/**/*.js`,
        `${PATHS.src()}/**/*.scss`
      ],
    },
    {
      // Prevent BrowserSync from reloading the page
      // and let webpack-dev-server take care of this
      reload: false,
    }),
  ],
})

module.exports = webpackConfig

/* eslint-disable import/no-extraneous-dependencies */
const merge = require('webpack-merge')
const TerserPlugin = require('terser-webpack-plugin')
const baseConfig = require('./webpack.common.js')

/**
 * This is the production config for webpack which
 * uses the TerserPlugin to minify the output.
 */

module.exports = merge(baseConfig, {
  mode: 'production',

  // Show performance hints if dependencies get too heavy
  performance: {
    hints: 'warning',
  },

  // Minify and compress javascript with the TerserPlugin
  optimization: {
    minimizer: [
      new TerserPlugin({
        extractComments: false,
      }),
    ],
  },
})

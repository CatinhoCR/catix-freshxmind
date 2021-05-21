/* eslint-disable import/no-extraneous-dependencies */
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const { PATHS } = require('./env.config')

/**
 * This is the base config for webpack which is used
 * by both webpack.dev.js and webpack.prod.js
 *
 * It defines the directories of our entry file and
 * output (built) files as well as loaders for js,
 * css, fonts, images and Modernizr.
 */

const env = process.env.NODE_ENV
const isDevelopment = env === 'development'

module.exports = {
  // Point this to our main source js file
  entry: {
    app: PATHS.src('js', 'app.js'),
    // guteditor: PATHS.src('js', 'gut-editor.js'),
  },

  // Point to our build folder for the compiled js file
  output: {
    path: PATHS.build(),
    filename: '[name].js',
  },

  // Extract CSS into the main.css file
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'main.css',
    }),
  ],

  module: {
    rules: [
      // Use babel-loader to transpile js for non-ES6 browsers
      // Use eslint-loader to emit eslint messages to the browser console
      {
        test: /\.js$/,
        exclude: /node_modules\/(?!(dom7|swiper)\/).*/,
        use: ['babel-loader', 'eslint-loader'],
        include: PATHS.src(),
      },

      // Since we are using sass, we need a couple of loaders to handle it
      {
        test: /\.scss$/,
        use: [
          // Enable hot module replacement for CSS when in development mode
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              hmr: isDevelopment,
            },
          },

          // The css-loader interprets @import and url() like
          // import/require() and will resolve them
          {
            loader: 'css-loader',
            options: {
              url: false,
              sourceMap: isDevelopment,
            },
          },

          // Add postcss-loader for autoprexing for older browsers
          // see package.json for browserslist settings
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: isDevelopment,
              config: {
                path: './build-tasks/postcss.config.js',
              },
            },
          },

          // The sass-loader compoiles scss to css
          {
            loader: 'sass-loader',
            options: { sourceMap: isDevelopment },
          },
        ],
      },

      // Use file-loader for fonts and images in the css
      {
        test: /\.(woff(2)?|ttf|eot|svg|jpe?g|png|gif|svg)$/,
        use: [
          {
            loader: 'file-loader',
          },
        ],
      },

      // Expose the custom Modernizr build as Modernizr to the main js
      // when imported. See src/js/app.js for use.
      {
        test: /modernizr\.js$/,
        loader: 'imports-loader?this=>window!exports-loader?window.Modernizr',
      },
    ],
  },
}

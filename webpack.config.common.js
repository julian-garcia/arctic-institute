const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const glob = require('glob');

module.exports = {
  context: path.resolve(__dirname, "assets"),
  output: {
    filename: 'main.bundle.js',
    path: path.resolve(__dirname, "assets/dist")
  },
  plugins: [
    new ImageminPlugin({
      externalImages: {
        context: '.',
        sources: glob.sync('assets/src/images/**/*.{png,jpg,svg,gif}'),
        destination: 'assets/dist/images',
        fileName: '[name].[ext]'
      }
    }),
    new MiniCssExtractPlugin()
  ],
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        // exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader, 'css-loader','postcss-loader','sass-loader']
      },
      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }
    ]
  }
}
const path = require('path');
const miniCssExtractPlugin = require('mini-css-extract-plugin');
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
        test: /\.css$/,
        use: [miniCssExtractPlugin.loader, 'css-loader','postcss-loader']
      },
      {
        test: /\.s[ac]ss$/,
        exclude: /node_modules/,
        use: [miniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
      }
    ]
  }
}
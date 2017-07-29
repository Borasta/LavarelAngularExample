var debug = process.env.NODE_ENV !== "production";
var webpack = require('webpack');

module.exports = {
  devtool: debug ? "inline-sourcemap" : null,
  entry: __dirname + "/resources/assets/app/app.js",
  output: {
    path: __dirname + "/public/app/",
    "filename": "app.min.js"
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components|vendor)/,
        loader: 'babel',
        query: {
          presets: ['es2015', 'stage-0'],
          plugins: ['add-module-exports'],
        }
      },
      { 
        test: /\.css$/,
        loader: "style!css" 
      },
      { 
        test: /\.(png|woff|woff2|eot|ttf|svg)$/, 
        loader: 'url?limit=100000' 
      },
      { 
        test: /\.svg$/, 
        loader: 'svg' 
      }
    ]
  },
  resolveLoader: {
    moduleExtensions: ["-loader"]
  },
  plugins: debug ? [] : [
    new webpack.optimize.DedupePlugin(),
    new webpack.optimize.OccurenceOrderPlugin(),
    new webpack.optimize.UglifyJsPlugin({ mangle: false, sourcemap: false }),
  ],
};
// Imports: Dependencies
const path = require('path');
// Webpack Configuration
const config = {
  
  // Entry
  entry: './js/db-promo-on-register-script.js',
  // Output
  output: {
    path: path.resolve(__dirname, './build'),
    filename: 'bundle.js',
  },
  // Loaders
  module: {
    rules : [
      // JavaScript/JSX Files
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: ['babel-loader'],
      },
      // CSS Files
      {
        test: /\.css$/,
        use: ['style-loader', 'css-loader'],
      }
    ]
  },
  // Plugins
  plugins: [],
};
// Exports
module.exports = config;
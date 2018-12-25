// Imports: Dependencies
const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
// Webpack Configuration
const config = {
    // Entry
    entry: {
        main: ['./js/db-promo-on-register-script.js', './scss/main.scss']
    },
    // Output
    output: {
        path: path.resolve(__dirname, './build'),
        filename: 'bundle.js',
    },
    // Loaders
    module: {
        rules: [
            // JavaScript/JSX Files
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: ['babel-loader'],
            }, {
                test: /\.scss$/,
                use: ["style-loader", // creates style nodes from JS strings
                    "css-loader", // translates CSS into CommonJS
                    "sass-loader" // compiles Sass to CSS, using Node Sass by default
                ]
            }
        ]
    },
    // Plugins
    plugins: [
        new ExtractTextPlugin({
            filename: 'bundle.min.css',
        })
    ],
};
// Exports
module.exports = config;
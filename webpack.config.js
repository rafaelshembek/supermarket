const path = require('path');
// const nodeExternals = require('webpack-node-externals');
module.exports = {
    entry: ['./src/index.js'],
    output: {
        path: path.resolve(__dirname),
        filename: 'bundle.js'
    },
    module: {
        rules: [
                {
                test: /\.js$/,
                // exclude: /node_modules/,
                use: 'babel-loader'
            }
        ]
    }
    // ,
    // optimization: {
    //     splitChunks: {
    //         cacheGroups: {
    //             vendor: {
    //                 test: /[\\/]node_modules[\\/]/,
    //                 name: 'vendor',
    //                 chunks: 'all',
    //             }
    //         }
    //     }
    // },
    // target: 'node',
    // externals: [nodeExternals()]
}
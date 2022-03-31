const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const HtmlWebpackPlugin = require('html-webpack-plugin');
const path = require('path')


var Path = {
    Js: {
        Dev: './src/assets/js/',
        Build: './dist/assets/js/'
    },
    Css: './src/assets/css/',
    Img: './src/assets/img/'
}

let config = {
    entry: {
        index: Path.Js.Dev + 'styles.js',
    },
    output: {
        path: path.resolve(__dirname, Path.Js.Build),
        filename: '[name].build.js'
    },
    module: {
        rules: [{
                test: /\.css$/i,
                use: [MiniCssExtractPlugin.loader, "css-loader"],
            },
            {
                test: /\.s[ac]ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                ]
            },
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                loader: 'babel-loader',
            }
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename: '../css/[name].css',
        }),
    ]
}


module.exports = (env, argv) => {
    if (argv.mode === 'development') {
        config.devtool = 'source-map';
        config.output.path = path.resolve(__dirname, './php/assets/js')
    }

    if (argv.mode === 'production') {
        //...
    }

    return config;
}
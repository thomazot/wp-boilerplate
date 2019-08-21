module.exports = (enve, argv) => {
    'use strict'
    const path = require('path')
    const MiniCssExtractPlugin = require('mini-css-extract-plugin')
    const UglifyJsPlugin = require('uglifyjs-webpack-plugin')
    const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin')
    const development = argv.mode
    const env = require('dotenv').config().parsed
    const CopyPlugin = require('copy-webpack-plugin')
    const THEME = 'wordpress' //typeof env.NAME === 'undefined' ? 'wordpress' : env.NAME

    // IN and OUT
    const config = {
        mode: development,
        entry: {
            app: './src/app.js',
        },
        output: {
            path: path.resolve(__dirname, `./www/themes/${THEME}/assets`),
            filename: 'app.js',
            chunkFilename: '[name].[hash].bundle.js',
            publicPath: `/wp-content/themes/${THEME}/assets/`,
        },
    }

    // Resolve
    config.resolve = {
        extensions: ['.js', '.jsx', '.json'],
        alias: {
            Configs: path.resolve(__dirname, './src/configs'),
            Assets: path.resolve(__dirname, './src/assets'),
        },
    }

    //  Plugins
    config.plugins = [
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
        new CopyPlugin([
            {
                from: 'src/theme',
                to: `../`,
                ignore: ['./src/assets/**/*.styl', './src/configs'],
            },
        ]),
        // new webpack.ProvidePlugin({})
    ]

    // Modules
    config.module = {
        rules: [
            {
                test: /\.(js|jsx)?$/,
                loader: 'babel-loader',
                exclude: /node_modules/,
                query: {
                    plugins: [
                        [
                            '@babel/plugin-transform-modules-commonjs',
                            {
                                allowTopLevelThis: true,
                            },
                        ],
                        '@babel/plugin-transform-runtime',
                        '@babel/plugin-syntax-dynamic-import',
                    ],
                    presets: ['@babel/preset-env'],
                },
            },
            {
                test: /\.(eot|woff|woff2|ttf|png|jpg|gif)$/,
                loader: 'url-loader?limit=30000&name=[name]-[hash].[ext]',
            },
            {
                test: /\.(styl|css)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            plugins: (loader) => [
                                require('autoprefixer')({
                                    browsers: ['last 2 versions'],
                                    grid: true,
                                }),
                                require('postcss-pxtorem')({
                                    unitPrecision: 5,
                                    propList: [
                                        'font',
                                        'font-size',
                                        'line-height',
                                        'letter-spacing',
                                        'width',
                                        'height',
                                        'max-width',
                                        'min-width',
                                        'padding',
                                        'margin',
                                    ],
                                    selectorBlackList: [],
                                    replace: true,
                                    mediaQuery: false,
                                    minPixelValue: 0,
                                }),
                                require('postcss-object-fit-images'),
                            ],
                        },
                    },
                    {
                        loader: 'stylus-loader',
                        options: {
                            import: [
                                path.resolve(
                                    __dirname,
                                    './src/configs/assets/variables.styl'
                                ),
                            ],
                        },
                    },
                ],
            },
        ],
    }

    if (development == 'development') {
    }

    // Production
    if (development == 'production') {
        config.optimization = {
            splitChunks: {
                cacheGroups: {
                    vendor: {
                        chunks: 'initial',
                        name: 'vendor',
                        test: 'vendor',
                        enforce: true,
                    },
                },
            },
            runtimeChunk: true,

            minimizer: [
                new UglifyJsPlugin({
                    extractComments: 'all',
                    cache: true,
                    parallel: true,
                    sourceMap: false,
                    uglifyOptions: {
                        compress: {
                            drop_console: true,
                        },
                        warnings: false,
                        parse: {},
                        mangle: true, // Note `mangle.properties` is `false` by default.
                        output: null,
                        toplevel: false,
                        nameCache: null,
                        ie8: false,
                        keep_fnames: false,
                    },
                }),
                new OptimizeCSSAssetsPlugin({}),
            ],
        }
    } else {
        config.optimization = {
            splitChunks: {
                cacheGroups: {
                    vendor: {
                        chunks: 'initial',
                        name: 'vendor',
                        test: 'vendor',
                        enforce: true,
                    },
                },
            },
            runtimeChunk: true,
        }
    }

    return config
}

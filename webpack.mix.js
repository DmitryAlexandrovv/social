const mix = require('laravel-mix');
const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')

    .webpackConfig(webpack => {
        return {
            module: {
                rules: [
                    {
                        // test: /\.(png|jpe?g|gif)$/i,
                        // use: [
                        //     {
                        //         loader: 'file-loader',
                        //         options: {
                        //             name: 'images/[hash].[ext]'
                        //         },
                        //     },
                        // ],
                    },
                ],
            },
            plugins: [
                new VuetifyLoaderPlugin()
            ],
        };
    });

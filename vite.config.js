import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import inject from "@rollup/plugin-inject";
import path from 'path';
import vitePluginRequire from "vite-plugin-require";

export default defineConfig({
    resolve: {
        alias: {
          '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
          '~jalaliCalendar':path.resolve(__dirname, 'node_modules/@majidh1/jalalidatepicker'),
        }
      },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),

        inject({   // => that should be first under plugins array
                  $: 'jquery',
                  jQuery: 'jquery',
                }),
        vitePluginRequire.default(),
                
    ],
});

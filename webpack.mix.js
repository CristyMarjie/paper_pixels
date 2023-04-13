const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);


mix.js('resources/js/pages/login/login.js','public/js/pages/login')
   .js('resources/js/pages/profile/profile.js','public/js/pages/profile')
   .js('resources/js/pages/profile/update_password.js','public/js/pages/profile')
   .js('resources/js/pages/profile/add-user.js','public/js/pages/profile')
   .js('resources/js/pages/profile/view-user.js','public/js/pages/profile')

mix.js('resources/js/pages/notifications/user_email_notification.js','public/js/pages/notifications')

mix.js('resources/js/pages/dashboard/system_logs_action.js','public/js/pages/dashboard')
   .js('resources/js/pages/dashboard/contact_us_action.js', 'public/js/pages/dashboard')


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
   .js('resources/js/pages/contract/contract_list.js','public/js/pages/contract')
   .js('resources/js/pages/contract/contract_details.js','public/js/pages/contract')
   .js('resources/js/pages/contract/bir_2307.js','public/js/pages/contract')
   .js('resources/js/pages/contract/proof_of_payment.js','public/js/pages/contract')
   .js('resources/js/pages/contract/other.js','public/js/pages/contract')
   .js('resources/js/pages/contract/add_more_contract.js','public/js/pages/contract')
   .js('resources/js/pages/profile/add-user.js','public/js/pages/profile')
   .js('resources/js/pages/tenant/tenant.js','public/js/pages/tenant')
   .js('resources/js/pages/profile/view-user.js','public/js/pages/profile')
   .js('resources/js/pages/announcement/add_announcement.js','public/js/pages/announcement')
   .js('resources/js/pages/malldirectory/add_mall.js','public/js/pages/malldirectory')
   .js('resources/js/pages/malldirectory/add_analyst.js','public/js/pages/malldirectory')
   .js('resources/js/pages/malldirectory/analyst_action.js','public/js/pages/malldirectory')
   .js('resources/js/pages/tenant/tenant_migration.js','public/js/pages/tenant')
   .js('resources/js/pages/contract/official_receipt.js','public/js/pages/contract')
   .js('resources/js/pages/notice/add_notice.js','public/js/pages/notice')
   .js('resources/js/pages/announcement/search_announcement.js','public/js/pages/announcement')

mix.js('resources/js/pages/notifications/user_notification.js','public/js/pages/notifications')
   .js('resources/js/pages/notifications/user_email_notification.js','public/js/pages/notifications')

mix.js('resources/js/pages/dashboard/system_logs_action.js','public/js/pages/dashboard')
   .js('resources/js/pages/dashboard/contact_us_action.js', 'public/js/pages/dashboard')


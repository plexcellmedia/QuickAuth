<?php

return [

    // Redirect to route after login success
    'login_success_route' => '',

    // Redirect to route after logout
    'logout_redirect_route' => 'quickauth.login.show',

    // Does your site support usernames?
    'username_support' => false,

    'layouts' => [
        'default'  => 'vendor.quickauth.layouts.default', // Master layout file for your site
        'login'    => '', // Keep blank to extend default
        'register' => '', // Keep blank to extend default
        'forgot'   => '', // Keep blank to extend default
    ],


    // Mail views
    'mails' => [
        'activation' => 'vendor.quickauth.mail.%lang%.activation',
        'forgot'     => 'vendor.quickauth.mail.%lang%.forgot',
        'reset'      => 'vendor.quickauth.mail.%lang%.reset'
    ],
];

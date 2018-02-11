<?php

return [
    'login' => [
        'title' => 'QuickAuth - Login',
        'fields' => [
            'placeholders' => [
                'email'    => 'E-mail address',
                'password' => 'Password',
            ],
        ],
        'buttons' => [
            'submit' => [
                'value' => 'Login',
            ],
        ],
        'links' => [
            'forgot' => [
                'text' => 'Forgot password?',
            ],
            'register' => [
                'text' => 'Register',
            ],
        ],
    ],

    'register' => [
        'title' => 'QuickAuth - Register',
        'fields' => [
            'placeholders' => [
                'email'            => 'E-mail address',
                'username'         => 'Username',
                'password'         => 'Password',
                'password_confirm' => 'Confirm password',
            ],
        ],
        'buttons' => [
            'submit' => [
                'value' => 'Register',
            ],
        ],
        'links' => [
            'login' => [
                'text' => 'Login',
            ],
        ],
    ],

    'forgot' => [
        'title' => 'QuickAuth - Recover password',
        'fields' => [
            'placeholders' => [
                'email'    => 'E-mail address',
            ],
        ],
        'buttons' => [
            'submit' => [
                'value' => 'Recover password',
            ],
        ],
        'links' => [
            'login' => [
                'text' => 'Login',
            ],
        ],
    ],
];

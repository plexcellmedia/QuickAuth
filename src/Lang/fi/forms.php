<?php

return [
    'login' => [
        'title' => 'Kirjaudu',
        'fields' => [
            'placeholders' => [
                'email'    => 'Sähköposti',
                'password' => 'Salasana',
            ],
        ],
        'buttons' => [
            'submit' => [
                'value' => 'Kirjaudu'
            ],
        ],
        'links' => [
            'forgot' => [
                'text' => 'Forgot password?'
            ],
            'register' => [
                'text' => 'Rekisteröidy',
            ],
        ],
    ],

    'register' => [
        'title' => 'Register',
        'fields' => [
            'placeholders' => [
                'email'            => 'Sähköposti',
                'username'         => 'Käyttäjänimi',
                'password'         => 'Salasana',
                'password_confirm' => 'Vahvista salasana'
            ],
        ],
        'buttons' => [
            'submit' => [
                'value' => 'Rekisteröidy'
            ],
        ],
        'links' => [
            'login' => [
                'text' => 'Kirjaudu',
            ],
        ],
    ],

    'forgot' => [
        'title' => 'Palauta salasana',
        'fields' => [
            'placeholders' => [
                'email'    => 'Sähköposti',
            ],
        ],
        'buttons' => [
            'submit' => [
                'value' => 'Palauta salasana'
            ],
        ],
        'links' => [
            'login' => [
                'text' => 'Kirjaudu',
            ],
        ],
    ],
];

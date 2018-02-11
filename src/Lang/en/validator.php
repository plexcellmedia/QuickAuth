<?php

return [
    'error' => 'Error!',
    
    'email' => [
        'required' => 'Email required.',
        'email'    => 'Invalid email.',
        'unique'   => 'Email taken already.',
        'exists'   => 'No user exists with that email.',
        'max'      => 'Email too long.',
    ],

    'username' => [
        'required' => 'Username required.',
        'max'      => 'Username too long.',
        'min'      => 'Username too short.',
        'unique'   => 'Username taken already.',
    ],

    'password' => [
        'required' => 'Password required.',
        'same'     => 'Password must match with confirmation.',
        'max'      => 'Password too long.',
        'min'      => 'Password too short.',
    ],

    'password_confirm' => [
        'required' => 'Password confirm required.',
    ],
];

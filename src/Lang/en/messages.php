<?php

return [
    'login' => [
        'success' => 'Successfully logged in!',
        'error' => [
            'invalid'  => 'Invalid email or password!',
            'throttle' => 'Too many failed login attempts. Please try again later!',
            'activate' => 'You must verify your account before you can login!',
        ]
    ],

    'register' => [
        'success' => 'Registered successfully. We sent account verification to your email!',
    ],

    'activate' => [
        'success' => 'Account successfully verified. You can login now!',
        'error'   => 'Invalid or expired verification link!'
    ],

    'forgot' => [
        'success' => 'Password reset link sent to your email!',
    ],

    'reset' => [
        'success' => 'Password changed. New password sent to your email!',
        'error'   => 'Invalid or expired password reset link!',
    ],

    'logout' => [
        'success' => 'Logged out successfully!',
    ],

    'password' => [
        'success' => 'Password changed!',
        'error'   => 'Current password invalid!',
    ],

];

<?php

return [
    'error' => 'Virhe!',
    
    'email' => [
        'required' => 'Sähköposti vaaditaan.',
        'email'    => 'Virheellinen sähköposti.',
        'unique'   => 'Sähköposti on varattu.',
        'exists'   => 'Sähköpostilla ei ole rekisteröity käyttäjätunnusta.',
        'max'      => 'Sähköposti on liian pitkä.',
    ],

    'username' => [
        'required' => 'Käyttäjätunnus vaaditaan.',
        'max'      => 'Käyttäjätunnus liian pitkä.',
        'min'      => 'Käyttäjätunnus on liian lyhyt.',
        'unique'   => 'Käyttäjätunnus on varattu.',
    ],

    'password' => [
        'required' => 'Salasana vaaditaan.',
        'same'     => 'Salasanan vahvistus tulee olla sama kuin salasana.',
        'max'      => 'Uusi salasana on liian pitkä.',
        'min'      => 'Uusi salasana on liian lyhyt.',
    ],

    'password_confirm' => [
        'required' => 'Salasana vahvistus vaaditaan.',
    ],
];

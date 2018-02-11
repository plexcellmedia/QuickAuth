<?php

return [
    'login' => [
        'success' => 'Kirjautuminen onnistui!',
        'error' => [
            'invalid'   => 'Virheellinen sähköposti tai salasana!',
            'throttle'  => 'Liian monta virheellistä kirjautumis yritystä. Kokeile myöhemmin uudelleen!',
            'activated' => 'Sinun pitää aktivoida käyttäjätunnuksesi ennenkuin voit kirjautua sisään!',
        ]
    ],

    'register' => [
        'success' => 'Rekisteröinti onnistui! Lähetimme sähköpostiisi viestin tilin aktivoimiseksi!',
    ],

    'activate' => [
        'success' => 'Käyttäjä aktivoitu onnistuneesti, voit kirjautua sisälle!',
        'error'   => 'Virheellinen tai erääntynyt aktivointilinkki!'
    ],

    'forgot' => [
        'success' => 'Salasanan resetointi linkki on lähetetty sähköpostiisi!',
    ],

    'reset' => [
        'success' => 'Salasana vaihdettu! Uusi salasana on lähetetty sähköpostiisi.',
        'error'   => 'Virheellinen tai erääntynyt resetointi linkki.',
    ],

    'logout' => [
        'success' => 'Kirjauduttu ulos onnistuneesti!',
    ],

    'password' => [
        'success' => 'Salasana vaihdettu onnistuneesti!',
        'error'   => 'Virheellinen nykyinen salasana!',
    ],

];

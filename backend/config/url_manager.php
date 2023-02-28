<?php

return [
    'showScriptName' => false,
    //  'enableStrictParsing'=>true,
    'enablePrettyUrl' => true,
//    'languages' => ['pl', 'en'],
    'rules' => [
//        'wyloguj' => 'site/logout',
        '' => 'site/index',
        'oferta/<slug:[-\w ]+>/<id:[^/]+>/<extra:[-\w ]+>' => 'offer/show',
        '<controller:[-\w ]+>/<id:[-\d ]+>' => '<controller>/view',
        '<controller:[-\w ]+>/<action:[-\w ]+>/<id:[-\d ]+>' => '<controller>/<action>',
        '<alias:index|contact|about|signup|request-password-reset|reset-password|auth|login|signup|info|logout|set-password|set-agreements|finished-agreements>' => 'site/<alias>',
    ],
];

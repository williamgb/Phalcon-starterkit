<?php

return new \Phalcon\Config([

    'database' => [

        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => ''
    ],

    'application' => [

        'controllersDir' => __DIR__  . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'librariesDir'   => __DIR__ . '/../../app/libraries/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'baseUri'        => '',
    ],

    'autoload' => [

        'configs' => []

    ]

]);

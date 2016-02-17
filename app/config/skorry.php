<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Titles
    |--------------------------------------------------------------------------
    |
    */
    'title'    => 'Flávio Zantut',
    'subtitle' => 'Web Developer',

    /*
    |--------------------------------------------------------------------------
    | Social
    |--------------------------------------------------------------------------
    |
    */
    'github'        => 'https://github.com/flaviozantut',
    'foursquare'    => 'https://foursquare.com/user/3328297',
    'instagram'     => 'http://instagram.com/flaviozantut',
    'google-plus'   => 'https://plus.google.com/112100489080294287923',
    'linkedin'      => 'http://www.linkedin.com/in/desenvolvedorweb',
    'twitter'       => 'https://twitter.com/flaviozantut',
    'facebook'      => '',
    'pinterest'     => '',
    'stackexchange' => '',
    'bitbucket'     => '',

    /*
    |--------------------------------------------------------------------------
    | Comments
    |--------------------------------------------------------------------------
    |
    */
    'disqus' => 'flaviopw',

    /*
    |--------------------------------------------------------------------------
    | analytics
    |--------------------------------------------------------------------------
    |
    */
    'analytics' => 'UA-10815887-4',

    /*
    |--------------------------------------------------------------------------
    | Sua página está pronta, ao menos que saiba oque está fazendo
    | não é recomendado fazer alterações a partir desse ponto
    |--------------------------------------------------------------------------
    |
    |                       _____
    |                _.,--`     `--.._
    |              _,'                 `._
    |            ,`                       ``.
    |          ,`   ,`\                /'.   `.
    |        .    ,`   \              /   `.   .
    |       /   ,`      \            /      `.  \
    |      ,   `,        \          /       ,'   `
    |     |      `.,      \        /     .'       |
    |    ,          `._    \      /    .'          .
    |    |             `.   \    /   ,'            |
    |   ,                `.` ,--. '.`               .
    |   |                   (    )                  |
    |   '                    `--'                   '
    |    |                   .--.                  |
    |    `                   |  |                  '
    |     |                  |  |                 |
    |      `                .    .               ,
    |       \               |    |              /
    |        `.            |      |           ,'
    |          `.          |______|         ,'
    |            `._                     _,'
    |               `._               _,'
    |                  ``--._____.--''
    */

    /*
    |--------------------------------------------------------------------------
    | Storage
    |--------------------------------------------------------------------------
    |
    |  Type storage to use
    |
    */
   'storage' => 'file',

   /*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    |  Path to storage and get Posts
    |
    */
   'path' => base_path().'/posts/',

    /*
    |--------------------------------------------------------------------------
    | Paginate
    |--------------------------------------------------------------------------
    |
    |  Number articles per page
    |
    */
    'paginate' => 10,

    'date_format'         => 'Y-m-d H:i:s',
    'date_format_on_post' => 'Y-m-d',
    'metadata_delimiter'  => '--------------------------------',

    'assets' => [
        'types' => [
            //folder     => type
            'coffee'     => 'coffee',
            'javascript' => 'js',
            'js'         => 'js',
            'css'        => 'css',
            'less'       => 'less',
            'sass'       => 'sass',
            'stylesheet' => 'css',
        ],
    ],

];

## skorry - Make fast your personal site!

[![Print Screen](https://dl.dropboxusercontent.com/u/20652183/skorry.png)](http://flavio.pw)

---

[![Latest Stable Version](https://poser.pugx.org/flaviozantut/skorry/v/stable.png)](https://packagist.org/packages/flaviozantut/skorry)

[![Total Downloads](https://poser.pugx.org/flaviozantut/skorry/downloads.png)](https://packagist.org/packages/flaviozantut/skorry)

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/flaviozantut/skorry/badges/quality-score.png?s=c3c33757acb99bd4a7f0c7fdcb6109fef80da524)](https://scrutinizer-ci.com/g/flaviozantut/skorry/)

[![Code Coverage](https://scrutinizer-ci.com/g/flaviozantut/skorry/badges/coverage.png?s=4245049f6158c38b8f17ec9b1924d7993219a99a)](https://scrutinizer-ci.com/g/flaviozantut/skorry/)

[![Build Status](https://drone.io/github.com/flaviozantut/skorry/status.png)](https://drone.io/github.com/flaviozantut/skorry/latest)

---

This project inspired on [syte](https://github.com/rigoneri/syte), but using PHP and Markdown to manage posts



### Install

    curl -s http://getcomposer.org/installer | php
    composer.phar create-project flaviozantut/skorry skorry
    cd skorry
    php artisan post:make
    php artisan serve



### Update informations

    /*
     * open app/config/skorry.php
     * and replace to your informations
     */

    return array(
        /*
        |--------------------------------------------------------------------------
        | Titles
        |--------------------------------------------------------------------------
        |
        */
        'title' => 'Flávio Zantut',
        'subtitle' => 'Web Developer',

        /*
        |--------------------------------------------------------------------------
        | Social
        |--------------------------------------------------------------------------
        |
        */
        "github" => "https://github.com/flaviozantut",
        "foursquare" => "https://foursquare.com/user/3328297",
        "instagram" => "http://instagram.com/flaviozantut",
        "google-plus" => "https://plus.google.com/112100489080294287923",
        "linkedin" => "http://www.linkedin.com/in/desenvolvedorweb",
        "twitter" => "https://twitter.com/flaviozantut",
        "facebook" => "",
        "pinterest" => "",
        "stackexchange" => "",
        "bitbucket" => "",

        /*
        |--------------------------------------------------------------------------
        | Comments
        |--------------------------------------------------------------------------
        |
        */
        "disqus" => "flaviopw",

        /*
        |--------------------------------------------------------------------------
        | analytics
        |--------------------------------------------------------------------------
        |
        */
        "analytics" => "UA-10815887-4",



### Custom style

    /*
     * open app/assets/less/tools/vars.less
     * and set your custom colors values
     */

    @gn-menu-bg: #efefef;
    @card-bg: lighten(@gn-menu-bg, 3);
    @link-collor: #546d7a;
    @link-active-collor: lighten(@link-collor, 16);

    @bg-collor: #546d7a;
    @default-shadow-collor: transparent;

    @footer-collor: lighten(#546d7a, 20);

Replace 'public/images' favicon.ico and profile.jpg.

### Your personal page will be ready!

-----


### Changelog

* version 0.0.1-dev
 * markdown post manager
 * make post from command line
 * simple style customization
 * dump assets on static files




### Roadmap

1. enable tags
1. rss
1. move assets manager to external package
1. get posts from dropbox
1. get posts from google drive
1. github api integration
1. twitter api integration
1. bitbucket api integration
1. google-plus api integration
1. linkedin api integration
1. instagram api integration
1. facebook api integration
1. foursquare api integration
1. pinterest api integration









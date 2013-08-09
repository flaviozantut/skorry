<!DOCTYPE html>
<html lang="en">
    <head>@section('head')
        <title>@section('title')
        {{ Config::get('skorry.title') }}
        @show</title>
        <link rel="shortcut icon" href="/images/favicon.ico">
        @section('meta')
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">
        @show
        @section('style')
            <link rel="shortcut icon" href="/images/favicon.ico">
            <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
            <link href="/assets/less/vendor.css" rel="stylesheet">
            <link href="/assets/less.css" rel="stylesheet">
        @show
        @section('headscript')
            <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
            <![endif]-->
        @show
    @show</head>

    <body>
        @section('body')
            @include('layouts._header')
            @yield('content')
            @include('layouts._footer')
        @show
        @section('script')
            <script type="text/javascript">
                var disqus_shortname = "{{ Config::get('skorry.disqus') }}";
            @if (Config::get('skorry.analytics'))
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', "{{ Config::get('skorry.analytics') }}"]);
                _gaq.push(['_trackPageview']);
                (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
            @endif
            </script>
            <script type="text/javascript" src="/assets/javascript/vendor.js"></script>
            <script type="text/javascript" src="/assets/javascript.js"></script>
        @show
    </body>
</html>

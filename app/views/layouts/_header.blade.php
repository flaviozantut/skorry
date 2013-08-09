@section('header')

<div class="container">
            <ul id="gn-menu" class="gn-menu-main">
                <li class="gn-trigger">
                    <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
                    <nav class="gn-menu-wrapper">
                        <div class="gn-scroller">
                            <ul class="gn-menu">
                                <li>
                                    <div class="profile">
                                        <div class="avatar">
                                              <img src="/images/profile.jpg" alt="">
                                        </div>
                                        <h1>{{ Config::get('skorry.title') }}</h1>
                                        <h2>{{ Config::get('skorry.subtitle') }}</h2>
                                    </div>
                                </li>
                                <li><a class="gn-icon icon-home" href="/">Home</a></li>
                                @foreach ($pages as $page)
                                    <li>
                                        @if ($page->external_url)
                                            <a class="gn-icon icon-external-link" href="{{$page->external_url}}">{{$page->title}}</a>
                                        @else
                                            <a class="gn-icon icon-link" href="/page/{{$page->permalink}}">{{$page->title}}</a>
                                        @endif
                                    </li>
                                @endforeach
                                @if (Config::get('skorry.github'))
                                    <li> <a class="gn-icon icon-github" href="{{ Config::get('skorry.github') }}">github</a></li>
                                @endif
                                @if (Config::get('skorry.foursquare'))
                                    <li> <a class="gn-icon icon-foursquare" href="{{ Config::get('skorry.foursquare') }}">foursquare</a></li>
                                @endif
                                @if (Config::get('skorry.instagram'))
                                    <li> <a class="gn-icon icon-instagram" href="{{ Config::get('skorry.instagram') }}">instagram</a></li>
                                @endif
                                @if (Config::get('skorry.google-plus'))
                                    <li> <a class="gn-icon icon-google-plus" href="{{ Config::get('skorry.google-plus') }}">google-plus</a></li>
                                @endif
                                @if (Config::get('skorry.linkedin'))
                                    <li> <a class="gn-icon icon-linkedin" href="{{ Config::get('skorry.linkedin') }}">linkedin</a></li>
                                @endif
                                @if (Config::get('skorry.twitter'))
                                    <li> <a class="gn-icon icon-twitter" href="{{ Config::get('skorry.twitter') }}">twitter</a></li>
                                @endif
                                @if (Config::get('skorry.facebook'))
                                    <li> <a class="gn-icon icon-facebook" href="{{ Config::get('skorry.facebook') }}">facebook</a></li>
                                @endif
                                @if (Config::get('skorry.pinterest'))
                                    <li> <a class="gn-icon icon-pinterest" href="{{ Config::get('skorry.pinterest') }}">pinterest</a></li>
                                @endif
                                @if (Config::get('skorry.stackexchange'))
                                    <li> <a class="gn-icon icon-stackexchange" href="{{ Config::get('skorry.stackexchange') }}">stackexchange</a></li>
                                @endif
                                @if (Config::get('skorry.bitbucket'))
                                    <li> <a class="gn-icon icon-bitbucket" href="{{ Config::get('skorry.bitbucket') }}">bitbucket</a></li>
                                @endif

                            </ul>
                        </div><!-- /gn-scroller -->
                    </nav>
                </li>
                <li><a href="/">{{ Config::get('skorry.title') }}</a></li>
            </ul>
        </div><!-- /container -->
@show

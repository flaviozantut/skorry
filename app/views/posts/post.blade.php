@extends('layouts.application')

@section('title')
{{$article->title}}
@stop
@section('content')
    <div class="container" >
        <div class="row">
            <div class="span12">
                <div class="card">
                   <h3 class="card-heading simple">{{$article->title}}</h3>
                   <div class="meta-date">
                        Posted on {{ date(Config::get('skorry.date_format_on_post'), strtotime($article->date)) }}
                    </div>
                    <div>
                        <div class="share"></div>
                    </div>
                   <div class="card-body card-body-complete">
                      {{$article->post}}
                   </div>
                   @if ($article->comments)
                       <div class="card-body card-body-complete">
                            <div id="disqus_thread"></div>
                       </div>
                   @endif

                   <div class="card-actions">
                      <a href="javascript:window.history.back()">&#xab; back</a>
                   </div>
                </div>
           </div>
        </div>
    </div>
@stop

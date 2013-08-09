@extends('layouts.application')
@section('content')
    <div class="container" >
        <div class="row" id="msnry">
            @foreach ($articles as $article)
                <div class="span6 msnry-item">
                    <div class="card">
                       <h3 class="card-heading simple">{{$article->title}}</h3>
                       <div class="meta-date">
                            Posted on {{ date(Config::get('skorry.date_format_on_post'), strtotime($article->date)) }}
                            @if($article->comments)
                            —
                            <a href="/article/{{$article->permalink}}#disqus_thread">Comments</a>
                            @endif
                        </div>
                       <div class="card-body">
                          {{$article->intro}}
                       </div>
                       <div class="card-actions">
                          <a href="/article/{{$article->permalink}}">» continue</a>
                       </div>
                    </div>
               </div>
            @endforeach
        </div>
        <div  class="row">
            <div class="span12">
                {{$paginator->links()}}
            </div>
        </div>
    </div>
@stop

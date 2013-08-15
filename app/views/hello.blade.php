@extends('layouts.application')

@section('content')
    <div class="container" >
        <div class="row">
            <div class="span12">
                <div class="card">
                   <div class="card-body card-body-complete">
                      {{$data}}
                   </div>
                </div>
           </div>
        </div>
    </div>
@stop

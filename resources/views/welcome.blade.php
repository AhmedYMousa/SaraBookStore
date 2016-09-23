@extends('main')
@section('title','Welcome')
@section('content') 
@section('stylesheets')
<style type="text/css">
    .panel-body
    {
        font-size: 100px;
    }
    .links
    {
        font-size: 50px;
    }
</style>
@endsection       
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body text-center">
                   <a href="/library">Sara BookStore</a> 
               
            

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                </div>
        </div>
        </div>
 @endsection       
      
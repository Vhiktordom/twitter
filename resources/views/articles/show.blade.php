@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<span>Article by Dr. Alex Karev</span>
                	<small><a href="/articles/{{ $article->id }}/edit">Edit</a></small>
                	<span class="pull-right"> {{ $article->created_at->diffForHumans() }} </span>
                	
            	</div>
	                <div class="panel-body">
	                	{{ $article->content }}
	                </div>
		                
            </div>
        </div>
    </div>
</div>
@endsection
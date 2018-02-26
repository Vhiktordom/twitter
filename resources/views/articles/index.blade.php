@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">

    	@forelse($articles as $article)
    		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">


                	<span> {{ $article->user->name }} </span>
                	<span class="pull-right">
                		{{ $article->created_at->diffForHumans() }}
                	</span> 

                </div>
                

                <div class="panel-body">
                	{{ $article->shortContent }}
                	<a href="/articles/{{ $article->id }}">Read more</a>
                </div>

                <div class="panel-footer clearfix" style="background: white">
                    @if($article->user_id == Auth::id())
                        <form action="articles/{{ $article->id }}" method="POST" class="pull-right" style="margin-left: 25px">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endif

                	<i class="fa fa-heart pull-right"></i>
                </div>
            </div>
        </div>
    	@empty
    		No Feed Found.
    	@endforelse

    	<div class="row">
    		<div class="col-md-4 col-md-offset-4 pull-right">
    			{{ $articles->links() }}
    		</div>
    	</div>
        
    </div>
</div>
@endsection
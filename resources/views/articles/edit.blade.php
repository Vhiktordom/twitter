@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit article</div>
	                <form action="/articles/{{ $article->id }}" method="POST">
	                	{{ method_field('PUT') }}
	                	{{ csrf_field() }}

	                	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

		                <div class="form-group">
	                	<label for="content">Content</label>
	                	<textarea name="content" class="form-control">{{ $article->content }}</textarea>
	                </div>

	               	<div class="checkbox">
	               		 <label>
	               			<input type="checkbox" name="live" {{ $article->live == 1 ? 'checked' : ''}}> Live 
	               		 </label>
	               	</div>

	               	<div class="form-group">
	               		<label for="post_on">Post on</label>
	               		<input type="datetime-local" name="post_on" value="{{$article->post_on->format('Y-m-d\TH:i:s' )}}" class="form-control">
	               	</div>

	                <div class="panel-body"><input type="submit" class="btn btn-primary pull-right"></div>

	              </form>
            </div>
        </div>
    </div>
</div>
@endsection
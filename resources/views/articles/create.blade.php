@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create article</div>
	                <form action="/articles" method="POST">
	                	{{ csrf_field() }}

	                	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

		                <div class="form-group">
	                	<label for="content">Content</label>
	                	<textarea name="content" class="form-control"></textarea>
	                </div>

	               	<div class="checkbox">
	               		 <label>
	               			<input type="checkbox" name="live"> Live
	               		 </label>
	               	</div>

	               	<div class="form-group">
	               		<label for="post_on">Post on</label>
	               		<input type="datetime-local" name="post_on" class="form-control">
	               	</div>

	                <div class="panel-body"><input type="submit" class="btn btn-primary pull-right"></div>

	              </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <ul class="list-group">

                <h2> {{ $users->count() }} users in this table</h2>
                <h2> {{ $users->total() }} total users</h2>

                @forelse($users as $user)
                    <li class="list-group-item" style="margin-top: 20px">
                    
                    <span> {{$user->name}} </span>
                    <?php

                        $dt     = Carbon\Carbon::now();
                        $past   = $dt->subMonth();
                        $future = $dt->addMonth(); 

                    ?>
                    <span class="pull-right clearfix">Joined {{ $user->created_at->diffForHumans()}}
                        <button class="btn btn-xs btn-primary">Follow</button>
                    </span>
                </li>
                @empty
                    <p>No Users Found</p>
                @endforelse

                {{$users->links() }}
            </ul>


        </div>
    </div>
</div>
@endsection

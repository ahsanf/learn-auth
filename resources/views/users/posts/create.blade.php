@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" action="{{ route('users.posts.store', [ $user->id ]) }}" method="POST">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (count($errors))
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif
                        <h4><a href="{{ route('users.show', [ $user->id ]) }}">{{ $user->name }}</a></h4>
                        <textarea name="story" class="form-control" rows="3" placeholder="Apa yang sedang anda pikirkan?"></textarea>
                    </div>
                    <div class="panel-footer clearfix">
                        <button type="submit" class="btn btn-default pull-right">Post</button>
                        <a href="{{ route('users.show', [ $user->id ]) }}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

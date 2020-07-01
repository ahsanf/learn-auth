@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @forelse ($posts as $key => $post)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="{{ route('users.show', [ $post->user_id ]) }}">{{ $post->user->name }}</a> <span class="pull-right text-muted"><abbr title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</abbr></span></h3>
                </div>
                <div class="panel-body">
                    <p>{{ $post->story }}</p>
                </div>
                @if (auth()->user()->id == $post->user_id)
                <div class="panel-footer clearfix">
                    <a class="btn btn-default pull-right" href="{{ route('users.posts.edit', [ $post->user_id, $post->id ]) }}" role="button">Edit</a>
                </div>
                @endif
            </div>
            @empty
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Belum ada post</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

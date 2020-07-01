@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Pengguna</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer clearfix">
                    <a class="btn btn-default" href="{{ route('users.index') }}" role="button">List Pengguna</a>
                    @if (Auth::user()->id == $user->id)
                    <a class="btn btn-default" href="{{ route('users.posts.create', [ $user->id ]) }}" role="button">Post Baru</a>
                    <a class="btn btn-default pull-right" href="{{ route('users.edit', [ $user->id ]) }}" role="button">Edit</a>
                    @endif
                </div>
            </div>
            @foreach ($user->posts()->orderBy('created_at', 'desc')->get() as $key => $post)
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title"><span class="pull-right text-muted"><abbr title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</abbr></span></h3>
                </div>
                <div class="panel-body">
                    <p>{{ $post->story }}</p>
                </div>
                @if (Auth::user()->id == $user->id)
                <div class="panel-footer clearfix">
                    <a class="btn btn-default pull-right" href="{{ route('users.posts.edit', [ $user->id, $post->id ]) }}" role="button">Edit</a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

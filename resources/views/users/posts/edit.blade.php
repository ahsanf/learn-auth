@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" action="{{ route('users.posts.update', [ $user->id, $post->id ]) }}" method="POST">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (count($errors))
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif
                        <h4><a href="{{ route('users.show', [ $user->id ]) }}">{{ $user->name }}</a></h4>
                        <textarea name="story" class="form-control" rows="3" placeholder="Apa yang sedang anda pikirkan?">{{ $post->story }}</textarea>
                    </div>
                    <div class="panel-footer clearfix">
                        <button type="submit" name="_method" value="PUT" class="btn btn-default pull-right">Simpan</button>
                        <button type="submit" name="_method" value="DELETE" class="btn btn-default">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" action="{{ route('users.update', [ $user->id ]) }}" method="POST">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Pengguna</h3>
                    </div>
                    <div class="panel-body">
                        @if (count($errors))
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" required value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="text" class="form-control" required value="{{ $user->email }}">
                            </div>
                        </div>
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

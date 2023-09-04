@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Обновление профиля пользователя </h2>
        </div>
        <div class="card-body">
            <form class="form-pill" action="{{ route('password.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Имя пользователя</label>
                        <input type="text" name="name" class="form-control" value="{{ $user['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Е-мэйл</label>
                        <input type="text" name="email" class="form-control" value="{{ $user['email'] }}">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection

@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Смена пользовательского пароля </h2>
        </div>
        <div class="card-body">
            <form class="form-pill" action="{{ route('password.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Текущий пароль</label>
                        <input type="password" name="old_password" class="form-control" id="current_password" placeholder="Введите текущий пароль">
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">Новый пароль</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Введите новый пароль">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">Подтвердите пароль</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Подтвердите пароль">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

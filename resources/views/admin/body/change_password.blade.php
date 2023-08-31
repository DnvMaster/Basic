@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Смена пользовательского пароля </h2>
        </div>
        <div class="card-body">
            <form class="form-pill" action="">
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Текущий пароль</label>
                        <input type="password" class="form-control" id="exampleFormControlInput3" placeholder="Введите текущий пароль">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">Новый пароль</label>
                        <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Введите новый пароль">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlPassword3">Подтвердите пароль</label>
                        <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Подтвердите пароль">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

@extends('admin.admin_master');
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Создание страницы о нас</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('about.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput">Заголовок</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput" placeholder="Введите заголовок">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Краткий текст</label>
                        <textarea class="form-control" name="about" rows="3" id="exampleFormControlTextarea1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Полный текст</label>
                        <textarea class="form-control" name="description" rows="3" id="exampleFormControlTextarea1"></textarea>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

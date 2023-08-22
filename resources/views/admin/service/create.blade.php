@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <h4>Раздел Сервис</h4>
                    </div>
                        <form action="{{ route('service.create') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Выберите иконку</label>
                                <input type="text" name="icon" class="form-control" id="exampleFormControlInput">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput">Заголовок</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput" placeholder="Введите заголовок">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Описание</label>
                                <textarea class="form-control" name="text" rows="3" id="exampleFormControlTextarea1"></textarea>
                            </div>
                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Добавить</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

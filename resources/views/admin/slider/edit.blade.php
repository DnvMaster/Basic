@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Добавление слайда</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Заголовок слайда</label>
                                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Название слайда">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Описание слайда</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Изображение слайда</label>
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                    <button type="submit" class="btn btn-primary btn-default">Создать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
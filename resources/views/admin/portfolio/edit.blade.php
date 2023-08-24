@extends('admin.admin_master');
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Редактирование страницы портфолио</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('portfolio/update/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $edit->img }}">
                    <div class="form-group">
                        <img src="{{ asset($edit->img) }}" alt="{{ $edit->title }}" style="width: 400px; height: 200px;">
                    </div>
                    <div class="form-group">
                        <input type="text" name="img" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $edit->img }}">
                        @error('img')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Обновить изображение </label>
                        <input type="file" name="img" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $edit->img }}">
                        @error('img')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Обновить заголовок</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $edit->title }}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Обновить текст</label>
                        <input type="text" name="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $edit->text }}">
                        @error('text')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Обновить</button>
                </form>
            </div>
        </div>
    </div>
@endsection




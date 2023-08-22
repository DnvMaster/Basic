@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('services/update/'.$edit->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail">Обновить название иконки</label>
                                <input type="text" name="icon" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $edit->icon }}">
                                @error('icon')
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
        </div>
    </div>
@endsection



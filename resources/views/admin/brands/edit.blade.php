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
                        <form action="{{ url('brand/update/'.$brands->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                            <div class="form-group">
                                <label for="exampleInputEmail">Обновить название бренда</label>
                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
                                @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">Обновить изображение бренда</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $brands->brand_image }}">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{ asset($brands->brand_image) }}" alt="{{ $brands->name }}" style="width: 400px; height: 200px;">
                                </div>

                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection

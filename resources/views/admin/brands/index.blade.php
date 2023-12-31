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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">Бренд</th>
                                        <th scope="col">Изображение</th>
                                        <th scope="col">Дата создания</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td><img src="{{ asset($brand->brand_image) }}" alt="{{ $brand->brand_name }}" title="{{ $brand->brand_name }}" style="height: 40px; width: 70px;"></td>
                                        <td>
                                            @if($brand->created_at == NULL)
                                                <span class="text-danger">Дата не установлена</span>
                                            @else
                                                {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('brand/edit/'.$brand->id) }}">Изменить</a>
                                            <a class="btn btn-danger" href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Вы действительно хотите удалить данный бренд !')">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $brands->links() }}
                        </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Добавить бренд</div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Название бренда</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Изображение бренда</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

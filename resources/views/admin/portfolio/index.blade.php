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
                                    <th scope="col">Изображение</th>
                                    <th scope="col">Заголовок</th>
                                    <th scope="col">Краткий текс</th>
                                    <th scope="col">Дата создания</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($images as $image)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td><img src="{{ asset($image->img) }}" alt="{{ $image->title }}" title="{{ $image->title }}" style="height: 40px; width: 70px;"></td>
                                        <td>{{ $image->title }}</td>
                                        <td>{{ $image->text }}</td>
                                        <td>
                                            @if($image->created_at == NULL)
                                                <span class="text-danger">Дата не установлена</span>
                                            @else
                                                {{ Carbon\Carbon::parse($image->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('portfolio/edit/'.$image->id) }}">Изменить</a>
                                            <a class="btn btn-danger" href="{{ url('portfolio/delete/'.$image->id) }}" onclick="return confirm('Вы действительно хотите удалить!')">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <a class="btn btn-info" href="{{ route('create') }}">Добавить</a>
                </div>
        </div>
    </div>
@endsection

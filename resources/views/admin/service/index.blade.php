@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4>Сервисы</h4>
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
                                <th scope="col">Заголовок</th>
                                <th scope="col">Иконка</th>
                                <th scope="col">Параграф</th>
                                <th scope="col">Полный текст</th>
                                <th scope="col">Дата создания</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($services as $service)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ $service->image }}</td>
                                    <td>{{ $service->paragraph }}</td>
                                    <td>{{ $service->text }}</td>
                                    <td>
                                        @if($service->created_at == NULL)
                                            <span class="text-danger">Дата не установлена</span>
                                        @else
                                            {{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ url('service/edit/'.$service->id) }}">Изменить</a>
                                        <a class="btn btn-danger" href="{{ url('service/delete/'.$service->id) }}" onclick="return confirm('Вы действительно хотите удалить этот раздел !')">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-info" href="{{ route('service.add') }}">Добавить</a>
            </div>
        </div>
    </div>
@endsection

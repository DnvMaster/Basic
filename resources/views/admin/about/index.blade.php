@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4>О нас</h4>
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
                                <th scope="col">Краткий текст</th>
                                <th scope="col">Полный текст</th>
                                <th scope="col">Дата создания</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                                @foreach($abouts as $about)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->about }}</td>
                                        <td>{{ $about->description }}</td>
                                        <td>
                                            @if($about->created_at == NULL)
                                                <span class="text-danger">Дата не установлена</span>
                                            @else
                                                {{ Carbon\Carbon::parse($about->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('about/edit/'.$about->id) }}">Изменить</a>
                                            <a class="btn btn-danger" href="{{ url('about/delete/'.$about->id) }}" onclick="return confirm('Вы действительно хотите удалить раздел о нас !')">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-info" href="{{ route('about.add') }}">Добавить</a>
            </div>
        </div>
    </div>
@endsection

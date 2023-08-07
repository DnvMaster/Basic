@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-headewr">Все слайды</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Описание</th>
                                        <th scope="col">Изображение</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <th scope="row">{{ $sliders->firstItem()+$loop->index }}
                                            </th>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->description }}</td>
                                            <td><img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" style="width: 40px; height: 70px;"></td>
                                            <td>
                                                @if($slider->created_at == NULL)
                                                    <span class="text-danger">Дата не установлена</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ url('slider/edit/'.$slider->id) }}">Редактировать</a>
                                                <a class="btn btn-danger" href="{{ url('delete/slider/'.$category->id) }}">В корзину</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <a href=""><button class="btn btn-success mt-5">Добавить</button></a>
            </div>
        </div>
    </div>
@endsection

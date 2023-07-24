<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Все категории <b></b></h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">Все категории</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Категория</th>
                                    <th scope="col">Пользователь</th>
                                    <th scope="col">Дата создания</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->user->name }}</td>
                                            <td>
                                                @if($category->created_at == NULL)
                                                    <span class="text-danger">Дата не установлена</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ url('category/edit/'.$category->id) }}">Редактировать</a>
                                                <a class="btn btn-danger" href="{{ url('delete/category/'.$category->id) }}">В корзину</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">Добавить категорию</div>
                        <div class="card-body">
                            <form action="{{ route('category.add') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Название категории</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Список удалённых категорий</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Категория</th>
                                    <th scope="col">Пользователь</th>
                                    <th scope="col">Дата создания</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trash as $category)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            @if($category->created_at == NULL)
                                                <span class="text-danger">Дата не установлена</span>
                                            @else
                                                {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('category/restore/'.$category->id) }}">Вернуть</a>
                                            <a class="btn btn-danger" href="{{ url('category/complete-removal/'.$category->id) }}">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $trash->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
            </div>
        </div>
    </div>
</x-app-layout>


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
                            <div class="card-header">
								<h4 class="center">Информация о контактах</h3>
							</div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col" width="5%">№</th>
                                    <th scope="col" width="7%">Контактный адрес</th>
                                    <th scope="col" width="15%">Контактная почта</th>
                                    <th scope="col" width="25%">Контактный номер</th>
                                    <th scope="col" width="15%">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <a href="{{ url('cotact/edit/'.$contact->id) }}" class="btn btn-info">Редактировать</a>
                                            <a href="{{ url('contact/delete/'.$contacts->id) }}" onclick="return confirm('Вы действительно хотите удалить данные о контакте!')" class="btn btn-danger">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <a class="btn btn-info mt-5" href="">Добавить</a>
            </div>
        </div>
    </div>
@endsection

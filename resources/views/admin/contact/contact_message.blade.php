@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4 class="mb-4">Сообщение администратору</h4>
            </div>
        </div>
    </div>
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
        </div>
        <div class="card-header">Все сообщения</div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="5%">№</th>
                <th scope="col" width="15%">Имя</th>
                <th scope="col" width="25%">Е-мэйл</th>
                <th scope="col" width="15%">Тема письма</th>
                <th scope="col" width="15%">Сообщение</th>
                <th scope="col" width="15%">Действие</th>
            </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($messages as $message)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->message }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('/contact/message/delete/'.$message->id) }}" onclick="return confirm('Вы действительно хотите удалить сообщение!')">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

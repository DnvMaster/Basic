@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Обновление профиля пользователя </h2>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            <form class="form-pill" action="{{ route('update.user.profile') }}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="hidden" name="old_profile_photo_path">
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Имя пользователя</label>
                        <input type="text" name="name" class="form-control" value="{{ $user['name'] }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Е-мэйл</label>
                        <input type="text" name="email" class="form-control" value="{{ $user['email'] }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Обновить фото</label>
                        <input type="file" name="profile_photo_path" class="form-control">
                        @error('profile_photo_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" style="width: 150px; height: 200px;">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection

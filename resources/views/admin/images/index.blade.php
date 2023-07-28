<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Изображения <b></b></h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">Все изображения</div>
                        <div class="card-group">
                            @foreach($images as $image)
                                <div class="col-sm-3 mt-5">
                                    <div class="card">
                                        <img src="{{ asset($image->image) }}" alt="Images">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Добавить изображение</div>
                        <div class="card-body">
                            <form action="{{ route('all-images') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail">Выберите изображение </label>
                                    <input type="file" name="images[]" class="form-control-sm" id="exampleInputEmail" aria-describedby="emailHelp" multiple="">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Изображения <b></b></h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">

                        <div class="card-header">Все изображения</div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Добавить изображение</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail">Выберите изображение </label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
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

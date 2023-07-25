<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Все бренды <b></b></h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Обновить бренд</div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$brands->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Обновить название бренда</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">Обновить изображение бренда</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $brands->brand_image }}">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{ asset($brands->brand_image) }}" alt="{{ $brands->name }}" style="width: 400px; height: 200px;">
                                </div>

                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@extends('admin.admin_master');
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Редактирование контактов</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('update/contact/'.$edit->id) }}" method="get">
                    @csrf
                    <div class=" col-md-6 form-group">
                        <label for="exampleFormControlInput">Контактный номер</label>
                        <input type="text" class="form-control" name="call" id="subject" value="{{ $edit->call }}">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="exampleFormControlInput">Контактный е-мэйл</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $edit->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Контактный адрес</label>
                        <textarea class="form-control" name="address" rows="3" id="exampleFormControlTextarea1">{{ $edit->address }}</textarea>
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

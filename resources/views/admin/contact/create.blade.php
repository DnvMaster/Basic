@extends('admin.admin_master')
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Создать Контакт</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('contact.create') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class=" col-md-6 form-group">
                                <label for="exampleFormControlInput">Контактный номер</label>
                                <input type="text" class="form-control" name="call" id="subject" placeholder="Введите свой номер телеона" data-rule="minlen:4" data-msg="Пожалуйста, введите свой номер телеона." />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleFormControlInput">Контактный е-мэйл</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Ваш е-мэйл" data-rule="email" data-msg="Введите правильный Е-мэйл" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlTextarea1">Контактный адрес</label>
                                <textarea class="form-control" name="address" rows="3" id="exampleFormControlTextarea1" placeholder="Введите адрес"></textarea>
                                <div class="validate"></div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="loading">Загрузка...</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Ваши данные успешно отправлены. Спасибо!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

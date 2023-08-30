@extends('layouts.master_home')
@section('home_content')
    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Контакты</h2>
                    <ol>
                        <li><a href="{{ url('/') }}">Главная</a></li>
                        <li><a href="{{ route('contact') }}">Контакты</a></li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- Start contact -->
        <section id="contact" class="contact">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row justify-content-center" data-aos="fade-up">

                    <div class="col-lg-10">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="icofont-google-map"></i>
                                    <h4>Адрес:</h4>
                                    <p>{{ $contacts->address }}</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-envelope"></i>
                                    <h4>Е-мэйл:</h4>
                                    <p>{{ $contacts->email }}</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-phone"></i>
                                    <h4>Телефон:</h4>
                                    <p>{{ $contacts->call }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row mt-5 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <form action="{{ route('contact.form') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" placeholder="Введите имя" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" placeholder="example@ishop.loc">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Тема письма">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" placeholder="Текст сообщения"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                        </form>
                    </div>

                </div>

            </div>
        </section>
        <!-- // End contact-->
        <!-- Start sitemap -->
        <div class="map-section">
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>
        <!-- // End sitemap -->
    </main>
@endsection

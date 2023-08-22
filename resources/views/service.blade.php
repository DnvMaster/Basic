<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Сервисы</h2>
            <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
        </div>
        <div class="row">
            @php
                $services = DB::table('services')->latest()->get();
            @endphp
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg"></svg>
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <h4><a href="">{{ $service->title }}</a></h4>
                        <p>{{ $service->text }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

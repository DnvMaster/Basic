<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Портфолио</h2>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div>
        <div class="row portfolio-container" data-aos="fade-up">
            @php
                $portfolios = DB::table('portfolios')->latest()->get();
            @endphp
            @foreach($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->filter }}">
                    <img src="{{ $portfolio->img }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{ $portfolio->title }}</h4>
                        <p>{{ $portfolio->text }}</p>
                        <a href="{{ asset('frontend/assets/img/portfolio/portfolio-1.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

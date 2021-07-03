@yield('testimonial')

<section class="colored-section" id="testimonials">

    <div id="testimonial-carousel" class="carousel slide" data-ride="false">
        <div class="carousel-inner">
            <div class="carousel-item active container-fluid">
                <h2 class="testimonial-text">Consectetur minim tempor magna aute dolor consectetur. Reprehenderit reprehenderit</h2>
                <img class="testimonial-img" src="images/client.jpg" alt="profile">
                <em>John, New York</em>
            </div>
            <div class="carousel-item container-fluid">
                <h2 class="testimonial-text">Consectetur minim tempor magna aute dolor consectetur. Reprehenderit reprehenderit</h2>
                <img class="testimonial-img" src="images/lady-img.jpg" alt="lady-profile">
                <em>Beverly, Illinois</em>
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

</section>
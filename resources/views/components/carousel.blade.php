<section class="project-carousel">
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($project->images as $image)
                <div class="swiper-slide @if($loop->first) swiper-slide-active @endif">
                    <img src="/storage/{{ $image->image }}" alt="">
                </div>
            @endforeach
        </div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <div class="swiper-pagination"></div>
    </div>
</section>

<script type="module">
    const swiper = new Swiper('.swiper', {
        loop: true,
        clickable: true,
        direction: 'horizontal',
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });
</script>

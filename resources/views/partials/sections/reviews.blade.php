@php
    use App\Models\PageText;
    use App\Models\Review;
    $page = $pageKey ?? 'home';
    $reviews = Review::active()->ordered()->get();
@endphp
<section class="revSection{{ isset($variant) ? ' ' . $variant : '' }}">
    <div class="container">
        <h2 class="titleAll titleAll-center">{{ PageText::getText($page, 'reviews_title', 'Отзывы') }}</h2>
        <div class="swiper mySwiper mySwiperMainRev">
            <div class="swiper-wrapper">
                @foreach($reviews as $review)
                <div class="swiper-slide swiper-slideMainRev">
                    <div class="swiper-slideMainRevContent">
                        <img src="/img/topSVGrev.svg" alt="" class="topSVGrev">
                        <img src="/img/bottomSVGrev.svg" alt="" class="bottomSVGrev">
                        @if($review->photo)
                            <img src="/storage/{{ $review->photo }}" alt="{{ $review->name }}" class="photoRev">
                        @else
                            <img src="/img/photoRev.png" alt="{{ $review->name }}" class="photoRev">
                        @endif
                        <p class="textRev">{{ $review->text }}</p>
                        <div class="starRev">
                            @for($i = 0; $i < $review->rating; $i++)
                                <img src="/img/starRev.svg" alt="">
                            @endfor
                        </div>
                        <div class="bottomRev">
                            <h3>{{ $review->name }}</h3>
                            <span>
                                @if($review->social_link_1)
                                    <a href="{{ $review->social_link_1 }}"><img src="/img/sr1.svg" alt=""></a>
                                @endif
                                @if($review->social_link_2)
                                    <a href="{{ $review->social_link_2 }}"><img src="/img/sr2.svg" alt=""></a>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="sliderPartnersArrows">
            <div class="swiper-button-next swiper-button-nextBannerRev">
                <img src="/img/arrowSliderR.svg" alt="">
            </div>
            <div class="swiper-button-prev swiper-button-prevBannerRev">
                <img src="/img/arrowSlider.svg" alt="">
            </div>
        </div>
    </div>
</section>

@extends('layouts.app')

@section('title', 'Fonte di Joy — Питомник')

@php
    use App\Models\PageText;
    use App\Models\Puppy;
    use App\Models\Slide;
    use App\Models\Setting;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    $puppies = Puppy::active()->ordered()->take(7)->get();
    $slides = Slide::active()->ordered()->get();
    $homeAboutImage = Setting::get('home_about_image');
@endphp

@section('content')
<section class="parallax-slider">
    <div class="swiper mySwiper mySwiper1">
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
            <div class="swiper-slide slide-item" data-parallax>
                <div class="slide-bg" style="background:url('{{ $slide->image ? Storage::url($slide->image) : '/img/bgSlideMain.png' }}') center center no-repeat; background-size: cover"></div>
                <div class="slide-content">
                    <div class="container">
                        <h1 class="textSlideBigMain">{{ $slide->title }}</h1>
                        <p class="textSlideSubMain">{{ $slide->subtitle }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="container">
            <div class="swiper-pagination swiper-pagination1"></div>
        </div>
    </div>
</section>

<section class="mainAbout">
    <div class="container">
        <div class="flexMainAbout">
            <div class="left-flexMainAbout">
                <h2 class="titleAll">{{ PageText::getText('home', 'about_title', 'О нашем питомнике') }}</h2>
                <div class="flex-textAll-p">
                    <p class="textAll-p">{{ PageText::getText('home', 'about_text_1', 'За годы нашей профессиональной деятельности мы смогли завоевать доверие и уважение прекрасных людей по всему миру.') }}</p>
                    <p class="textAll-p">{{ PageText::getText('home', 'about_text_2', 'Мы уделяем особое внимание здоровью, уходу и дрессировке наших собак, чтобы они были не только успешными на выставках , но и здоровыми и счастливыми питомцами для своих владельцев.') }}</p>
                    <p class="textAll-p">{{ PageText::getText('home', 'about_text_3', 'Ниже, вы найдете мои дипломы и документы подтверждающие мою квалификацию и многолетний опыт работы c животными.') }}</p>
                </div>
                <a href="{{ route('about') }}" class="linkSlideBigMain">{{ PageText::getText('home', 'about_button', 'Подробнее') }}</a>
            </div>
            <img src="{{ $homeAboutImage ? Storage::url($homeAboutImage) : '/img/photo-flexMainAbout.png' }}" alt="" class="photo-flexMainAbout">
        </div>
    </div>
</section>

<section class="sliderMainSell">
    <div class="container">
        <h2 class="titleAll titleAll-center">{{ PageText::getText('home', 'sell_title', 'Щенки на продажу') }}</h2>
        <div class="swiper mySwiper mySwiperMainSell">
            <div class="swiper-wrapper">
                @foreach($puppies as $puppy)
                <div class="swiper-slide swiper-slideMainSell">
                    <div class="contentMainSellSlide">
                        @if($puppy->is_new)
                            <img src="/img/new.svg" alt="" class="newTag">
                        @endif
                        @if($puppy->photo)
                            @if(Str::endsWith(strtolower($puppy->photo), ['.mp4', '.webm', '.mov']))
                                <video src="{{ Storage::url($puppy->photo) }}" class="photoContentMainSellSlide" muted autoplay loop playsinline></video>
                            @else
                                <img src="{{ Storage::url($puppy->photo) }}" alt="{{ $puppy->name }}" class="photoContentMainSellSlide">
                            @endif
                        @else
                            <img src="/img/contentMainSellSlide__img.png" alt="{{ $puppy->name }}" class="photoContentMainSellSlide">
                        @endif
                        <div class="text-contentMainSellSlide">
                            <h3>{{ $puppy->name }}</h3>
                            <p>{{ $puppy->catalog_short_description }}</p>
                            <div class="flex-text-contentMainSellSlide">
                                <a href="{{ route('catalog.item', $puppy->slug) }}" class="linkSlideBigMain">Подробнее</a>
                                <span>{{ $puppy->formatted_price }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="sliderPartnersArrows">
            <div class="swiper-button-next swiper-button-nextBanner">
                <img src="/img/arrowSliderR.svg" alt="">
            </div>
            <div class="swiper-button-prev swiper-button-prevBanner">
                <img src="/img/arrowSlider.svg" alt="">
            </div>
        </div>
    </div>
</section>

@include('partials.sections.pluses-main')

@include('partials.sections.reviews')

@include('partials.sections.contacts', ['pageKey' => 'contact', 'showForm' => false])
@endsection

@push('scripts-before')
<script src="https://api-maps.yandex.ru/2.1/?apikey=ffade94c-c25f-46b4-8adf-99f45a70d939&lang=ru_RU"></script>
<script src="/map.js"></script>
@endpush

@push('scripts')
<script>
    const swiper = new Swiper(".mySwiper1", {
        loop: true,
        speed: 800,
        parallax: false,
        pagination: {
            el: ".swiper-pagination1",
            clickable: true
        }
    });
</script>
<script>
    const swiper2 = new Swiper(".mySwiperMainSell", {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-nextBanner",
            prevEl: ".swiper-button-prevBanner",
        },
        breakpoints: {
            1920: {
                slidesPerView: 3,
            },
            1300: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 2,
            },
            800: {
                slidesPerView: 2,
            },
            700: {
                slidesPerView: 2,
            },
            600: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 1,
            },
            400: {
                slidesPerView: 1,
            },
            300: {
                slidesPerView: 1,
            },
        },
    });
</script>
<script>
    const swiper3 = new Swiper(".mySwiperMainRev", {
        slidesPerView: 2,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-nextBannerRev",
            prevEl: ".swiper-button-prevBannerRev",
        },
        breakpoints: {
            1920: {
                slidesPerView: 2,
            },
            1300: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 2,
            },
            800: {
                slidesPerView: 1,
            },
            700: {
                slidesPerView: 1,
            },
            600: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 1,
            },
            400: {
                slidesPerView: 1,
            },
            300: {
                slidesPerView: 1,
            },
        },
    });
</script>
@endpush

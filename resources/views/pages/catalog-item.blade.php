@extends('layouts.app')

@section('title', $puppy->name . ' — Fonte di Joy')

@php
    use App\Models\PageText;
    use Illuminate\Support\Facades\Storage;
    $genderText = match($puppy->gender) {
        'male' => 'Мальчик',
        'female' => 'Девочка',
        default => $puppy->gender,
    };
    $statusText = match($puppy->status) {
        'available' => 'В продаже',
        'reserved' => 'Зарезервирован',
        'sold' => 'Продан',
        default => $puppy->status,
    };
@endphp

@section('content')
<section class="bannerMainAboutSlider">
    <div class="container">
        <div class="bannerGreyTop">
            <h2 style="color: #FB6F58;">{{ $puppy->name }}</h2>
            <p>{{ $puppy->description }}</p>
        </div>
        <img src="/img/photo-bannerGreyTop.png" alt="" class="photo-bannerGreyTop">
    </div>
</section>

<section class="revSection revSection-2">
    <div class="container">
        <div class="flexCardCatalogTop">
            <div class="left-flexCardCatalogTop">
                <div class="swiper mySwiper-left-flexCardCatalogTop">
                    <div class="swiper-wrapper">
                        @if($puppy->photo)
                            <div class="swiper-slide swiper-slide-mySwiper-left-flexCardCatalogTop">
                                <img src="{{ Storage::url($puppy->photo) }}" alt="{{ $puppy->name }}">
                            </div>
                        @endif
                        @if($puppy->gallery)
                            @foreach($puppy->gallery as $image)
                                <div class="swiper-slide swiper-slide-mySwiper-left-flexCardCatalogTop">
                                    <img src="{{ Storage::url($image) }}" alt="{{ $puppy->name }}">
                                </div>
                            @endforeach
                        @endif
                        @if(!$puppy->photo && !$puppy->gallery)
                            <div class="swiper-slide swiper-slide-mySwiper-left-flexCardCatalogTop">
                                <img src="/img/mySwiper-left-flexCardCatalogTop.png" alt="">
                            </div>
                        @endif
                    </div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper-left-flexCardCatalogTop-2">
                    <div class="swiper-wrapper swiper-wrapper-card">
                        @if($puppy->photo)
                            <div class="swiper-slide swiper-slide-mySwiper-left-flexCardCatalogTop2">
                                <img src="{{ Storage::url($puppy->photo) }}" alt="{{ $puppy->name }}">
                            </div>
                        @endif
                        @if($puppy->gallery)
                            @foreach($puppy->gallery as $image)
                                <div class="swiper-slide swiper-slide-mySwiper-left-flexCardCatalogTop2">
                                    <img src="{{ Storage::url($image) }}" alt="{{ $puppy->name }}">
                                </div>
                            @endforeach
                        @endif
                        @if(!$puppy->photo && !$puppy->gallery)
                            <div class="swiper-slide swiper-slide-mySwiper-left-flexCardCatalogTop2">
                                <img src="/img/mySwiper-left-flexCardCatalogTop2.png" alt="">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="right-flexCardCatalogTop">
                <div class="flex-textAll-p">
                    <p class="textAll-p">{{ $puppy->description }}</p>
                </div>
                <div class="blockInfo-right-flexCardCatalogTop">
                    @if($puppy->breed)
                    <div class="line-blockInfo-right-flexCardCatalogTop">
                        <span>Порода</span>
                        <div class="line-line-blockInfo-right-flexCardCatalogTop"></div>
                        <p>{{ $puppy->breed }}</p>
                    </div>
                    @endif
                    @if($puppy->gender)
                    <div class="line-blockInfo-right-flexCardCatalogTop">
                        <span>Пол</span>
                        <div class="line-line-blockInfo-right-flexCardCatalogTop"></div>
                        <p>{{ $genderText }}</p>
                    </div>
                    @endif
                    @if($puppy->color)
                    <div class="line-blockInfo-right-flexCardCatalogTop">
                        <span>Окрас</span>
                        <div class="line-line-blockInfo-right-flexCardCatalogTop"></div>
                        <p>{{ $puppy->color }}</p>
                    </div>
                    @endif
                    @if($puppy->age)
                    <div class="line-blockInfo-right-flexCardCatalogTop">
                        <span>Возраст</span>
                        <div class="line-line-blockInfo-right-flexCardCatalogTop"></div>
                        <p>{{ $puppy->age }}</p>
                    </div>
                    @endif
                    @if($puppy->coat)
                    <div class="line-blockInfo-right-flexCardCatalogTop">
                        <span>Шерсть</span>
                        <div class="line-line-blockInfo-right-flexCardCatalogTop"></div>
                        <p>{{ $puppy->coat }}</p>
                    </div>
                    @endif
                    <div class="line-blockInfo-right-flexCardCatalogTop">
                        <span>Статус</span>
                        <div class="line-line-blockInfo-right-flexCardCatalogTop"></div>
                        <p>{{ $statusText }}</p>
                    </div>
                </div>
                <div class="price-right-flexCardCatalogTop">
                    <div class="flex-price-right-flexCardCatalogTop">
                        <p>Стоимость:</p>
                        <h2>{{ $puppy->formatted_price }}</h2>
                    </div>
                    <p>* Доставка в стоимость не входит, оплачивается отдельно.</p>
                </div>
            </div>
        </div>

        <div class="accordion">
            <div class="accordion-item">
                <button class="accordion-header">
                    Договор оферты
                    <svg class="arrowDown" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path class="arrowDownPath" d="M19.9201 8.94995L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.94995" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="accordion-content">
                    <div class="file-row">
                        <span>Договор оферты (ru)</span>
                        <a href="#">Скачать .word</a>
                    </div>
                    <div class="file-row">
                        <span>Договор оферты (en)</span>
                        <a href="#">Скачать .word</a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">
                    Договор купли-продажи
                    <svg class="arrowDown" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path class="arrowDownPath" d="M19.9201 8.94995L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.94995" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="accordion-content">
                    <div class="file-row">
                        <span>Договор купли-продажи (ru)</span>
                        <a href="#">Скачать .word</a>
                    </div>
                    <div class="file-row">
                        <span>Договор купли-продажи (en)</span>
                        <a href="#">Скачать .word</a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">
                    Обязанности заводчика
                    <svg class="arrowDown" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path class="arrowDownPath" d="M19.9201 8.94995L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.94995" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="accordion-content">
                    <div class="flex-textAll-p flex-textAll-p22">
                        <p class="textAll-p">За годы нашей профессиональной деятельности мы смогли завоевать доверие и уважение прекрасных людей по всему миру.</p>
                        <p class="textAll-p">Мы уделяем особое внимание здоровью, уходу и дрессировке наших собак, чтобы они были не только успешными на выставках , но и здоровыми и счастливыми питомцами для своих владельцев.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">
                    Гарантии заводчика
                    <svg class="arrowDown" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path class="arrowDownPath" d="M19.9201 8.94995L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.94995" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="accordion-content">
                    <div class="flex-textAll-p flex-textAll-p22">
                        <p class="textAll-p">За годы нашей профессиональной деятельности мы смогли завоевать доверие и уважение прекрасных людей по всему миру.</p>
                        <p class="textAll-p">Мы уделяем особое внимание здоровью, уходу и дрессировке наших собак, чтобы они были не только успешными на выставках , но и здоровыми и счастливыми питомцами для своих владельцев.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">
                    Ответственность покупателя
                    <svg class="arrowDown" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path class="arrowDownPath" d="M19.9201 8.94995L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.94995" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="accordion-content">
                    <div class="flex-textAll-p flex-textAll-p22">
                        <p class="textAll-p">За годы нашей профессиональной деятельности мы смогли завоевать доверие и уважение прекрасных людей по всему миру.</p>
                        <p class="textAll-p">Мы уделяем особое внимание здоровью, уходу и дрессировке наших собак, чтобы они были не только успешными на выставках , но и здоровыми и счастливыми питомцами для своих владельцев.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-header">
                    Обязанности покупателя
                    <svg class="arrowDown" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path class="arrowDownPath" d="M19.9201 8.94995L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.94995" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="accordion-content">
                    <div class="flex-textAll-p flex-textAll-p22">
                        <p class="textAll-p">За годы нашей профессиональной деятельности мы смогли завоевать доверие и уважение прекрасных людей по всему миру.</p>
                        <p class="textAll-p">Мы уделяем особое внимание здоровью, уходу и дрессировке наших собак, чтобы они были не только успешными на выставках , но и здоровыми и счастливыми питомцами для своих владельцев.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    var swiper6 = new Swiper(".mySwiper-left-flexCardCatalogTop-2", {
        spaceBetween: 10,
        slidesPerView: 4,
    });
    var swiper7 = new Swiper(".mySwiper-left-flexCardCatalogTop", {
        thumbs: {
            swiper: swiper6,
        },
    });
</script>
@endpush

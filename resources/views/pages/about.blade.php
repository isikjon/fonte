@extends('layouts.app')

@section('title', 'О питомнике — Fonte di Joy')

@php
    use App\Models\PageText;
@endphp

@section('content')
<section class="bannerMainAboutSlider">
    <div class="container">
        <div class="swiper mySwiper mySwiperBannerMainAboutSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slideBannerMainAboutSlider">
                    <div class="swiper-slideBannerMainAboutSlider1">
                       <h1>{{ PageText::getText('about', 'banner_title', 'Лучшие из лучших') }}</h1>
                        <p>{{ PageText::getText('about', 'banner_text', 'Наш девиз и смысл работы нашего питомника.') }}</p>
                    </div>
                </div>
                <div class="swiper-slide swiper-slideBannerMainAboutSlider">
                    <div class="swiper-slideBannerMainAboutSlider1">
                        <h1>{{ PageText::getText('about', 'banner_title', 'Лучшие из лучших') }}</h1>
                        <p>{{ PageText::getText('about', 'banner_text', 'Наш девиз и смысл работы нашего питомника.') }}</p>
                    </div>
                </div>
                <div class="swiper-slide swiper-slideBannerMainAboutSlider">
                    <div class="swiper-slideBannerMainAboutSlider1">
                        <h1>{{ PageText::getText('about', 'banner_title', 'Лучшие из лучших') }}</h1>
                        <p>{{ PageText::getText('about', 'banner_text', 'Наш девиз и смысл работы нашего питомника.') }}</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination2"></div>
        </div>
        <img src="/img/photo-mySwiperBannerMainAboutSlider.png" alt="" class="photo-mySwiperBannerMainAboutSlider">
    </div>
</section>

<section class="mainAbout mainAbout-2">
    <div class="container">
        <div class="flexMainAbout">
            <div class="left-flexMainAbout">
                <h2 class="titleAll">{{ PageText::getText('about', 'about_title', 'О нашем питомнике') }}</h2>
                <div class="flex-textAll-p flex-textAll-p-2">
                    <p class="textAll-p" style="text-align: justify;">{{ PageText::getText('about', 'about_text_1', 'Питомник основан в 2010 году. Мы специализируемся на разведение собак породы чихуахуа. Наши производители имеют достойное происхождение, крепкое здоровье, подтвержденное лучшими лабораториями и специалистами.') }}</p>
                    <p class="textAll-p" style="text-align: justify;">{{ PageText::getText('about', 'about_text_2', 'За годы своей профессиональной деятельности мы смогли завоевать доверие и уважение прекрасных людей по всему миру. Мы гордимся тем, что наш питомник является домом для чемпионов и что наша племенная работа и опыт помогают производить высококачественное потомство. Мы уделяем особое внимание здоровью, уходу и дрессировке наших собак, чтобы они были не только успешными на выставках, но и здоровыми и счастливыми питомцами для своих владельцев.') }}</p>
                    <p class="textAll-p" style="text-align: justify;">{{ PageText::getText('about', 'about_text_3', 'Наша международная репутация и успешные результаты наших выпускников подтверждают то, что мы вложили много усилий и пристального внимания в нашу работу. Наши выпускники живут в 30 странах мира, что несомненно является прекрасным доказательством высокого доверия и показателем качества наших выпускников.') }}</p>
                    <p class="textAll-p" style="text-align: justify;">{{ PageText::getText('about', 'about_text_4', 'Ниже, вы найдете мои дипломы и документы, подтверждающие мою квалификацию и многолетний опыт работы c животными.') }}</p>
                    <p class="textAll-p" style="text-align: justify;">{{ PageText::getText('about', 'about_text_5', 'Вместе с тем, на сайте питомника вы также можете ознакомиться с условиями содержания, рекомендациями, отзывами, а также получить квалифицированную консультацию кинолога.') }}</p>
                    <span>{{ PageText::getText('about', 'about_signature', 'С уважением, Ольга Дмитриева') }}</span>
                </div>
            </div>
            <img src="/img/photo-flexMainAbout2.png" alt="" class="photo-flexMainAbout">
        </div>
    </div>
</section>

@include('partials.sections.pluses-about')

@include('partials.sections.certificates')
@endsection

@push('scripts')
<script>
    const swiper4 = new Swiper(".mySwiperBannerMainAboutSlider", {
        pagination: {
            el: ".swiper-pagination2",
            clickable: true
        }
    });
</script>
@endpush

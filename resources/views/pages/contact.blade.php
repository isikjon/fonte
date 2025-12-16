@extends('layouts.app')

@section('body-class', 'contactPage')

@section('title', 'Контакты — Fonte di Joy')

@php
    use App\Models\PageText;
    use App\Models\Faq;
    $faqs = Faq::active()->ordered()->get();
    $faqsByCategory = $faqs->groupBy('category');
@endphp

@section('content')
<section class="bannerMainAboutSlider">
    <div class="container">
        <div class="bannerGreyTop">
            <h2>{{ PageText::getText('contact', 'banner_title', 'Контакты') }}</h2>
            <p>{{ PageText::getText('contact', 'banner_text', 'Свяжитесь с нами любым удобным способом. Мы всегда рады ответить на ваши вопросы.') }}</p>
        </div>
        <img src="/img/photo-bannerGreyTop.png" alt="" class="photo-bannerGreyTop">
    </div>
</section>

<section class="faqSectionContact">
    <div class="container">
        <div class="faqBlockGrey">
            <h2 class="titleAll">Часто Задаваемые Вопросы</h2>
            <p class="faqSubtitle">Прежде чем задать новый вопрос, просим Вас ознакомиться со списком часто задаваемых вопросов и ответов. Если ответ на ваш вопрос опубликован в данном разделе, мы оставляем за собой право не отвечать.</p>
            
            @foreach($faqsByCategory as $category => $categoryFaqs)
                @if($category)
                    <h3 class="faqCategoryTitle">{{ $category }}:</h3>
                @endif
                <div class="accordion">
                    @foreach($categoryFaqs as $faq)
                        <div class="accordion-item">
                            <button class="accordion-header">
                                {{ $faq->question }}
                                <span class="accordion-plus">+</span>
                            </button>
                            <div class="accordion-content">
                                <div class="flex-textAll-p flex-textAll-p22">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="contactFormSection">
    <div class="container">
        <h2 class="titleAll">{{ PageText::getText('contact', 'form_title', 'Напишите нам') }}</h2>
        <p class="textAll-p formSubtitle">{{ PageText::getText('contact', 'form_text', 'Если у вас возникли вопросы, жалобы или предложения — воспользуйтесь формой обратной связи.') }}</p>
        <form action="mailto:dmitrieva.rostov@gmail.com" method="post" enctype="text/plain" class="formContactTop">
            @csrf
            <div class="formContactTopInputs">
                <input type="text" name="name" placeholder="Ваше имя" required>
                <input type="text" name="phone" placeholder="Телефон" required>
                <input type="email" name="email" placeholder="E-mail" required>
            </div>
            <textarea name="message" placeholder="Ваш комментарий..." required></textarea>
            <button type="submit">Отправить</button>
            <div class="flexPoliteForm">
                <input id="checkTop" type="checkbox" required checked>
                <label for="checkTop">
                    <p>Я даю согласие на обработку своих <a href="#!">персональных данных</a></p>
                </label>
            </div>
        </form>
    </div>
</section>

<section class="contactSectionMain contactSectionMainPage">
    <div class="container">
        <div class="flex-contactSectionMain">
            <div class="leftFlex-contactSectionMain">
                <div class="contactInfoBlock">
                    <h2 class="titleAll">Наши контакты</h2>
                    <div class="contactInfoItem">
                        <div class="contactInfoIcon contactInfoIcon-time"></div>
                        <div class="contactInfoText">
                            <h4>МЫ НА СВЯЗИ</h4>
                            <p>пн-пт 10:00-19:00</p>
                            <p class="contact-note contact-note-light">* по московскому времени</p>
                        </div>
                    </div>
                    <div class="contactInfoItem">
                        <div class="contactInfoIcon contactInfoIcon-phone"></div>
                        <div class="contactInfoText">
                            <h4>ПОЗВОНИТЬ НАМ</h4>
                            <a href="tel:+79885100111">+7 (988) 5-100-111</a>
                            <p class="contact-note contact-note-light">* по московскому времени</p>
                        </div>
                    </div>
                    <div class="contactInfoItem">
                        <div class="contactInfoIcon contactInfoIcon-email"></div>
                        <div class="contactInfoText">
                            <h4>НАПИСАТЬ НАМ</h4>
                            <a href="mailto:dmitrieva.rostov@gmail.com">dmitrieva.rostov@gmail.com</a>
                        </div>
                    </div>
                    <div class="contactInfoItem">
                        <div class="contactInfoIcon contactInfoIcon-company"></div>
                        <div class="contactInfoText">
                            <h4>Fontedijoy</h4>
                            <p>344056, Россия, Ростовская область,</p>
                            <p>г. Ростов-на-Дону, площадь Чкалова</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map" id="map"></div>
        </div>
    </div>
</section>
@endsection

@push('scripts-before')
<script src="https://api-maps.yandex.ru/2.1/?apikey=12813675-b836-483b-9db7-5c71d2075e70&lang=ru_RU"></script>
<script src="/map.js"></script>
@endpush

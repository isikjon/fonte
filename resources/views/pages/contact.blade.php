@extends('layouts.app')

@section('body-class', 'contactPage')

@section('title', 'Контакты — Fonte di Joy')

@php
    use App\Models\PageText;
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

<section class="contactFormSection">
    <div class="container">
        <h2 class="titleAll titleAll-center">{{ PageText::getText('contact', 'form_title', 'Напишите нам') }}</h2>
        <p class="textAll-p text-center" style="text-align: center; margin-bottom: 30px;">{{ PageText::getText('contact', 'form_text', 'Если у вас возникли вопросы, жалобы или предложения — воспользуйтесь формой обратной связи.') }}</p>
        <form action="" method="post" class="formContactTop">
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

<section class="revSection revSection-2">
    <div class="container">
        <h2 class="titleAll titleAll-center">Часто задаваемые вопросы</h2>
        <div class="accordion">
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

<section class="contactSectionMain contactSectionMainPage">
    <div class="container">
        <div class="flex-contactSectionMain">
            <div class="leftFlex-contactSectionMain">
                <h2 class="titleAll">{{ PageText::getText('contact', 'contacts_title', 'Наши контакты') }}</h2>
                <div class="block-leftFlex-contactSectionMain">
                    <span>Телефон</span>
                    <a href="tel:+79999999999">+7 (999) 999 99-99</a>
                </div>
                <div class="block-leftFlex-contactSectionMain">
                    <span>E-mail</span>
                    <a href="mailto:example@example.com">example@example.com</a>
                </div>
                <div class="block-leftFlex-contactSectionMain">
                    <span>Адрес</span>
                    <p>площадь Чкалова, Ростов-на-Дону, Ростовская обл., 344056</p>
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

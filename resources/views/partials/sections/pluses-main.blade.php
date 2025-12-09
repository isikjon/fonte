@php
    use App\Models\PageText;
@endphp
<section class="plusesSectionMain">
    <div class="container">
        <div class="flex-plusesSectionMain">
            <div class="block-plusesSectionMain">
                <img src="/img/block-plusesSectionMain-1.svg" alt="" class="photo-block-plusesSectionMain">
                <div class="text-block-plusesSectionMain">
                    <p>{{ PageText::getText('home', 'plus_1_title', 'Профессиональный кинолог') }}</p>
                    <a href="https://fontedijoy.ru/about">Подробнее</a>
                </div>
            </div>
            <div class="block-plusesSectionMain">
                <img src="/img/block-plusesSectionMain-2.svg" alt="" class="photo-block-plusesSectionMain">
                <div class="text-block-plusesSectionMain">
                    <p>{{ PageText::getText('home', 'plus_2_title', 'Достойное содержание') }}</p>
                    <a href="https://fontedijoy.ru/about">Подробнее</a>
                </div>
            </div>
            <div class="block-plusesSectionMain">
                <img src="/img/block-plusesSectionMain-3.svg" alt="" class="photo-block-plusesSectionMain">
                <div class="text-block-plusesSectionMain">
                    <p>{{ PageText::getText('home', 'plus_3_title', 'Профессиональная доставка') }}</p>
                    <a href="https://fontedijoy.ru/about">Подробнее</a>
                </div>
            </div>
            <div class="block-plusesSectionMain">
                <img src="/img/block-plusesSectionMain-4.svg" alt="" class="photo-block-plusesSectionMain">
                <div class="text-block-plusesSectionMain">
                    <p>{{ PageText::getText('home', 'plus_4_title', 'Поддержка и консультация') }}</p>
                    <a href="https://fontedijoy.ru/about">Подробнее</a>
                </div>
            </div>
            <div class="block-plusesSectionMain">
                <img src="/img/block-plusesSectionMain-5.svg" alt="" class="photo-block-plusesSectionMain">
                <div class="text-block-plusesSectionMain">
                    <p>{{ PageText::getText('home', 'plus_5_title', 'Профессиональное вет. обследование') }}</p>
                    <a href="https://fontedijoy.ru/about">Подробнее</a>
                </div>
            </div>
            <div class="block-plusesSectionMain">
                <img src="/img/block-plusesSectionMain-6.svg" alt="" class="photo-block-plusesSectionMain">
                <div class="text-block-plusesSectionMain">
                    <p>{{ PageText::getText('home', 'plus_6_title', 'Международная репутация') }}</p>
                    <a href="https://fontedijoy.ru/about">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</section>

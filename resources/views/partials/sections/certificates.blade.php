@php
    use App\Models\PageText;
@endphp
<section class="sertOurPage">
    <div class="container">
        <h2 class="titleAll">{{ PageText::getText('about', 'certificates_title', 'Наши сертификаты') }}</h2>
        <div class="flex-sertOurPage">
            <div class="blockLittle-sertOurPage blockAll-sertOurPage">
                <img src="/img/blockLittle-sertOurPage.png" alt="Свидетельство регистрации">
                <p>Свидетельство регистрации</p>
            </div>
            <div class="blockBig-sertOurPage blockAll-sertOurPage">
                <img src="/img/blockBig-sertOurPage-1.png" alt="Государственное и муниципальное управление">
                <p>Государственное и муниципальное управление</p>
            </div>
            <div class="blockBig-sertOurPage blockAll-sertOurPage">
                <img src="/img/blockBig-sertOurPage-2.png" alt="Кинология">
                <p>Кинология</p>
            </div>
        </div>
    </div>
</section>

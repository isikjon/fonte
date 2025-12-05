@php
    use App\Models\Setting;
    use App\Models\Document;
    $documents = Document::active()->ordered()->get();
@endphp
<footer>
    <div class="container">
        <div class="flexFooterFirst">
            <a class="logoFooter" href="{{ route('home') }}">
                <img src="/img/logo.svg" alt="Fonte di Joy">
            </a>
            <div class="socialsFooter">
                <p>Мы в соцсетях</p>
                <div class="flex-socialsFooter">
                    @if(Setting::get('social_instagram'))
                    <a href="{{ Setting::get('social_instagram') }}" target="_blank">
                        <img src="/img/flex-socialsFooter-1.svg" alt="Instagram">
                    </a>
                    @endif
                    @if(Setting::get('social_facebook'))
                    <a href="{{ Setting::get('social_facebook') }}" target="_blank">
                        <img src="/img/flex-socialsFooter-2.svg" alt="Facebook">
                    </a>
                    @endif
                    @if(Setting::get('social_vk'))
                    <a href="{{ Setting::get('social_vk') }}" target="_blank">
                        <img src="/img/flex-socialsFooter-3.svg" alt="VK">
                    </a>
                    @endif
                    @if(Setting::get('social_youtube'))
                    <a href="{{ Setting::get('social_youtube') }}" target="_blank">
                        <img src="/img/flex-socialsFooter-4.svg" alt="YouTube">
                    </a>
                    @endif
                    @if(Setting::get('social_odnoklassniki'))
                    <a href="{{ Setting::get('social_odnoklassniki') }}" target="_blank">
                        <img src="/img/flex-socialsFooter-5.svg" alt="OK">
                    </a>
                    @endif
                </div>
            </div>
            <div class="socialsFooter">
                <p>Написать нам</p>
                <div class="flex-socialsFooter">
                    @if(Setting::get('social_viber'))
                    <a href="{{ Setting::get('social_viber') }}" target="_blank">
                        <img src="/img/flex-socialsFooter-6.svg" alt="Viber">
                    </a>
                    @endif
                    @if(Setting::get('social_telegram'))
                    <a href="{{ Setting::get('social_telegram') }}" target="_blank">
                        <img src="/img/flex-socialsFooter-7.svg" alt="Telegram">
                    </a>
                    @endif
                    @if(Setting::get('social_whatsapp'))
                    <a href="{{ Setting::get('social_whatsapp') }}" target="_blank">
                        <img src="/img/flex-socialsFooter-8.svg" alt="WhatsApp">
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="footerBottom">
        <div class="container">
            <div class="flex-footerBottom">
                <p>{{ date('Y') }} © «Fonte di Joy — Питомник»</p>
                <div class="flex-flex-footerBottom">
                    @foreach($documents as $doc)
                    <a href="{{ route('document', $doc->slug) }}">{{ $doc->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>

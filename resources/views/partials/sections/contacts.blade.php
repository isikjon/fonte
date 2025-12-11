@php
    use App\Models\PageText;
    $page = $pageKey ?? 'home';
@endphp
<section class="contactSectionMain contactSectionMainPage">
    <div class="container">
        <div class="flex-contactSectionMain">
            @if(isset($showForm) && $showForm)
            <form action="mailto:dmitrieva.rostov@gmail.com" method="post" enctype="text/plain" class="formFooterContact">
                @csrf
                <input type="text" name="name" placeholder="{{ PageText::getText($page, 'form_name_placeholder', 'Имя') }}" required>
                <input type="text" name="phone" placeholder="{{ PageText::getText($page, 'form_phone_placeholder', 'Телефон') }}" required>
                <select name="budget" required>
                    <option selected disabled>{{ PageText::getText($page, 'form_budget_placeholder', 'Бюджет') }}</option>
                    <option>300 $</option>
                    <option>500 $</option>
                    <option>600 $</option>
                    <option>1000 $</option>
                </select>
                <textarea name="message" placeholder="{{ PageText::getText($page, 'form_message_placeholder', 'Письмо') }}" required></textarea>
                <button type="submit">{{ PageText::getText($page, 'form_button', 'Отправить') }}</button>
                <div class="flexPoliteForm">
                    <input id="check" type="checkbox" required checked>
                    <label for="check">
                        <p>{!! PageText::getText($page, 'form_agreement', 'Я согласен(-на) c <a href="#!">условиями пользовательского соглашения</a> и <a href="#!">политики конфиденциальности</a>. Я принимаю условия <a href="#!">договора оферты</a>.') !!}</p>
                    </label>
                </div>
            </form>
            @endif
            <div class="leftFlex-contactSectionMain">
                <div class="contactInfoBlock">
                    <h2 class="titleAll">{{ PageText::getText($page, 'contacts_title', 'Наши контакты') }}</h2>
                    <div class="contactInfoItem">
                        <div class="contactInfoIcon contactInfoIcon-time"></div>
                        <div class="contactInfoText">
                            <h4>{{ PageText::getText($page, 'contacts_online_title', 'МЫ НА СВЯЗИ') }}</h4>
                            <p>{{ PageText::getText($page, 'contacts_online_time', 'пн-пт 10:00-19:00') }}</p>
                            <p class="contact-note contact-note-light">{{ PageText::getText($page, 'contacts_online_note', '* по московскому времени') }}</p>
                        </div>
                    </div>
                    <div class="contactInfoItem">
                        <div class="contactInfoIcon contactInfoIcon-phone"></div>
                        <div class="contactInfoText">
                            <h4>{{ PageText::getText($page, 'contacts_phone_title', 'ПОЗВОНИТЬ НАМ') }}</h4>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', PageText::getText($page, 'contacts_phone', '+79885100111')) }}">{{ PageText::getText($page, 'contacts_phone', '+7 (988) 5-100-111') }}</a>
                            <p class="contact-note contact-note-light">{{ PageText::getText($page, 'contacts_phone_note', '* по московскому времени') }}</p>
                        </div>
                    </div>
                    <div class="contactInfoItem">
                        <div class="contactInfoIcon contactInfoIcon-email"></div>
                        <div class="contactInfoText">
                            <h4>{{ PageText::getText($page, 'contacts_email_title', 'НАПИСАТЬ НАМ') }}</h4>
                            <a href="mailto:{{ PageText::getText($page, 'contacts_email', 'dmitrieva.rostov@gmail.com') }}">{{ PageText::getText($page, 'contacts_email', 'dmitrieva.rostov@gmail.com') }}</a>
                        </div>
                    </div>
                    <div class="contactInfoItem">
                        <div class="contactInfoIcon contactInfoIcon-company"></div>
                        <div class="contactInfoText">
                            <h4>{{ PageText::getText($page, 'contacts_company_title', 'Fontedijoy') }}</h4>
                            <p>{{ PageText::getText($page, 'contacts_address_line1', '344056, Россия, Ростовская область,') }}</p>
                            <p>{{ PageText::getText($page, 'contacts_address_line2', 'г. Ростов-на-Дону, площадь Чкалова') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map" id="map"></div>
        </div>
    </div>
</section>

@php
    use App\Models\PageText;
    $page = $pageKey ?? 'home';
@endphp
<section class="contactSectionMain">
    <div class="container">
        <div class="flex-contactSectionMain">
            @if(isset($showForm) && $showForm)
            <form action="" method="post" class="formFooterContact">
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
                <h2 class="titleAll">{{ PageText::getText($page, 'contacts_title', 'Наши контакты') }}</h2>
                <div class="block-leftFlex-contactSectionMain">
                    <span>{{ PageText::getText('contact', 'phone_label', 'Телефон') }}</span>
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', PageText::getText($page, 'contacts_phone', '+79999999999')) }}">{{ PageText::getText($page, 'contacts_phone', '+7 (999) 999 99-99') }}</a>
                </div>
                <div class="block-leftFlex-contactSectionMain">
                    <span>{{ PageText::getText('contact', 'email_label', 'E-mail') }}</span>
                    <a href="mailto:{{ PageText::getText($page, 'contacts_email', 'example@example.com') }}">{{ PageText::getText($page, 'contacts_email', 'example@example.com') }}</a>
                </div>
                <div class="block-leftFlex-contactSectionMain">
                    <span>{{ PageText::getText('contact', 'address_label', 'Адрес') }}</span>
                    <p>{{ PageText::getText($page, 'contacts_address', 'площадь Чкалова, Ростов-на-Дону, Ростовская обл., 344056') }}</p>
                </div>
            </div>
            <div class="map" id="map"></div>
        </div>
    </div>
</section>

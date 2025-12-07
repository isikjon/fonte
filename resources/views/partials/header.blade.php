<header @if(!isset($isHomePage) || !$isHomePage) style="position: fixed; width: 100%; top: 0px; z-index: 10" @endif class="@if(isset($isHomePage) && $isHomePage) site-header @endif">
    <div class="headerWhite">
        <div class="container">
            <div class="flex-headerWhite">
                <a href="{{ route('home') }}" class="logoHeader">
                    <img src="/img/logo.svg" alt="Fonte di Joy">
                </a>
                <div class="rightHeader">
                    <a href="tel:+79999999999" class="telHeader">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.42C21.55 19.78 21.33 20.12 21.04 20.44C20.55 20.98 20.01 21.37 19.4 21.62C18.8 21.87 18.15 22 17.45 22C16.43 22 15.34 21.76 14.19 21.27C13.04 20.78 11.89 20.12 10.75 19.29C9.6 18.45 8.51 17.52 7.47 16.49C6.44 15.45 5.51 14.36 4.68 13.22C3.86 12.08 3.2 10.94 2.72 9.81C2.24 8.67 2 7.58 2 6.54C2 5.86 2.12 5.21 2.36 4.61C2.6 4 2.98 3.44 3.51 2.94C4.15 2.31 4.85 2 5.59 2C5.87 2 6.15 2.06 6.4 2.18C6.66 2.3 6.89 2.48 7.07 2.74L9.39 6.01C9.57 6.26 9.7 6.49 9.79 6.71C9.88 6.92 9.93 7.13 9.93 7.32C9.93 7.56 9.86 7.8 9.72 8.03C9.59 8.26 9.4 8.5 9.16 8.74L8.4 9.53C8.29 9.64 8.24 9.77 8.24 9.93C8.24 10.01 8.25 10.08 8.27 10.16C8.3 10.24 8.33 10.3 8.35 10.36C8.53 10.69 8.84 11.12 9.28 11.64C9.73 12.16 10.21 12.69 10.73 13.22C11.27 13.75 11.79 14.24 12.32 14.69C12.84 15.13 13.27 15.43 13.61 15.61C13.66 15.63 13.72 15.66 13.79 15.69C13.87 15.72 13.95 15.73 14.04 15.73C14.21 15.73 14.34 15.67 14.45 15.56L15.21 14.81C15.46 14.56 15.7 14.37 15.93 14.25C16.16 14.11 16.39 14.04 16.64 14.04C16.83 14.04 17.03 14.08 17.25 14.17C17.47 14.26 17.7 14.39 17.95 14.56L21.26 16.91C21.52 17.09 21.7 17.3 21.81 17.55C21.91 17.8 21.97 18.05 21.97 18.33Z" fill="#434C4C" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10"/>
                        </svg>
                        +7 (999) 999 - 99 - 99
                    </a>
                    <div class="socialsHeader">
                        <a href="#!">
                            <img src="/img/sHeader-1.svg" alt="">
                        </a>
                        <a href="#!">
                            <img src="/img/sHeader-2.svg" alt="">
                        </a>
                        <a href="#!">
                            <img src="/img/sHeader-3.svg" alt="">
                        </a>
                    </div>
                    <div class="dropdown lang-dropdown">
                        <div class="langHeader" id="langToggle">
                            <img src="https://flagcdn.com/w40/ru.png" alt="" class="lang-flag-img" id="currentFlag">
                            <span id="currentLang">RU</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M16.5999 9.45834L11.1666 14.8917C10.5249 15.5333 9.4749 15.5333 8.83324 14.8917L3.3999 9.45834" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="dropdown-content lang-dropdown-content">
                            <div class="lang-option" data-lang="ru" data-flag="ru"><img src="https://flagcdn.com/w40/ru.png" alt="" class="lang-flag-img"> RU</div>
                            <div class="lang-option" data-lang="en" data-flag="gb"><img src="https://flagcdn.com/w40/gb.png" alt="" class="lang-flag-img"> EN</div>
                            <div class="lang-option" data-lang="es" data-flag="es"><img src="https://flagcdn.com/w40/es.png" alt="" class="lang-flag-img"> ES</div>
                            <div class="lang-option" data-lang="pt" data-flag="pt"><img src="https://flagcdn.com/w40/pt.png" alt="" class="lang-flag-img"> PT</div>
                            <div class="lang-option" data-lang="zh" data-flag="cn"><img src="https://flagcdn.com/w40/cn.png" alt="" class="lang-flag-img"> ZH</div>
                        </div>
                    </div>
                    <div class="hamburger-menu">
                        <input id="menu__toggle" type="checkbox" />
                        <label class="menu__btn" for="menu__toggle">
                            <img src="/img/burger.svg" alt="" class="burgerSvg">
                            <img class="closeBurger" src="/img/closeBurger.svg" alt="">
                        </label>
                        <ul class="menu__box">
                            <li class="content-burger">
                                <ul class="listBurgerUl">
                                    <li>
                                        <a href="tel:+79999999999">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.42C21.55 19.78 21.33 20.12 21.04 20.44C20.55 20.98 20.01 21.37 19.4 21.62C18.8 21.87 18.15 22 17.45 22C16.43 22 15.34 21.76 14.19 21.27C13.04 20.78 11.89 20.12 10.75 19.29C9.6 18.45 8.51 17.52 7.47 16.49C6.44 15.45 5.51 14.36 4.68 13.22C3.86 12.08 3.2 10.94 2.72 9.81C2.24 8.67 2 7.58 2 6.54C2 5.86 2.12 5.21 2.36 4.61C2.6 4 2.98 3.44 3.51 2.94C4.15 2.31 4.85 2 5.59 2C5.87 2 6.15 2.06 6.4 2.18C6.66 2.3 6.89 2.48 7.07 2.74L9.39 6.01C9.57 6.26 9.7 6.49 9.79 6.71C9.88 6.92 9.93 7.13 9.93 7.32C9.93 7.56 9.86 7.8 9.72 8.03C9.59 8.26 9.4 8.5 9.16 8.74L8.4 9.53C8.29 9.64 8.24 9.77 8.24 9.93C8.24 10.01 8.25 10.08 8.27 10.16C8.3 10.24 8.33 10.3 8.35 10.36C8.53 10.69 8.84 11.12 9.28 11.64C9.73 12.16 10.21 12.69 10.73 13.22C11.27 13.75 11.79 14.24 12.32 14.69C12.84 15.13 13.27 15.43 13.61 15.61C13.66 15.63 13.72 15.66 13.79 15.69C13.87 15.72 13.95 15.73 14.04 15.73C14.21 15.73 14.34 15.67 14.45 15.56L15.21 14.81C15.46 14.56 15.7 14.37 15.93 14.25C16.16 14.11 16.39 14.04 16.64 14.04C16.83 14.04 17.03 14.08 17.25 14.17C17.47 14.26 17.7 14.39 17.95 14.56L21.26 16.91C21.52 17.09 21.7 17.3 21.81 17.55C21.91 17.8 21.97 18.05 21.97 18.33Z" fill="#434C4C" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10"/>
                                            </svg>
                                            +7 (999) 999 - 99 - 99
                                        </a>
                                        <div class="socialsHeader">
                                            <a href="#!">
                                                <img src="/img/sHeader-1.svg" alt="">
                                            </a>
                                            <a href="#!">
                                                <img src="/img/sHeader-2.svg" alt="">
                                            </a>
                                            <a href="#!">
                                                <img src="/img/sHeader-3.svg" alt="">
                                            </a>
                                        </div>
                                        <a href="{{ route('home') }}">Главная</a>
                                        <a href="{{ route('about') }}">О питомнике</a>
                                        <a href="{{ route('students') }}">Наши выпускники</a>
                                        <a href="{{ route('catalog') }}">Щенки на продажу</a>
                                        <a href="{{ route('delivery') }}">Доставка</a>
                                        <a href="{{ route('blog') }}">Блог</a>
                                        <a href="{{ route('contact') }}">Контакты</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="headerGrey">
        <div class="container">
            <div class="flex-headerGrey">
                <a href="{{ route('home') }}" class="link-flex-headerGrey">Главная</a>
                <div class="dropdown">
                    <div class="langHeader langHeader2">
                        <p>О питомнике</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M16.5999 9.45834L11.1666 14.8917C10.5249 15.5333 9.4749 15.5333 8.83324 14.8917L3.3999 9.45834" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="dropdown-content dropdown-content2">
                        <a href="{{ route('about') }}">О нас</a>
                        <a href="{{ route('students') }}">Наши выпускники</a>
                    </div>
                </div>
                <a href="{{ route('catalog') }}" class="link-flex-headerGrey">Щенки на продажу</a>
                <div class="dropdown">
                    <div class="langHeader langHeader2">
                        <p>Услуги</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M16.5999 9.45834L11.1666 14.8917C10.5249 15.5333 9.4749 15.5333 8.83324 14.8917L3.3999 9.45834" stroke="#434C4C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="dropdown-content dropdown-content2">
                        <a href="{{ route('delivery') }}">Доставка</a>
                    </div>
                </div>
                <a href="{{ route('blog') }}" class="link-flex-headerGrey">Блог</a>
                <a href="{{ route('contact') }}" class="link-flex-headerGrey">Контакты</a>
            </div>
        </div>
    </div>
</header>


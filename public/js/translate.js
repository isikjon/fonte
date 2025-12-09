var siteTranslator = {
    currentLang: 'ru',
    flags: {
        'ru': 'ru',
        'en': 'gb',
        'es': 'es',
        'pt': 'pt',
        'zh': 'cn'
    },
    langNames: {
        'ru': 'RU',
        'en': 'EN',
        'es': 'ES',
        'pt': 'PT',
        'zh': 'ZH'
    },
    localeMap: {
        'ru': 'ru-RU',
        'en': 'en-US',
        'es': 'es-ES',
        'pt': 'pt-PT',
        'zh': 'zh-CN'
    },

    init: function() {
        var savedLang = localStorage.getItem('selectedLang') || 'ru';
        this.currentLang = savedLang;
        this.updateUI();
        this.formatDates();
        if (savedLang !== 'ru') {
            this.translatePage(savedLang);
        }
        this.bindEvents();
    },

    bindEvents: function() {
        var self = this;
        var options = document.querySelectorAll('.lang-option');
        options.forEach(function(option) {
            option.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var lang = this.getAttribute('data-lang');
                self.setLanguage(lang);
            });
        });
    },

    setLanguage: function(lang) {
        localStorage.setItem('selectedLang', lang);
        location.reload();
    },

    updateUI: function() {
        var currentFlag = document.getElementById('currentFlag');
        var currentLang = document.getElementById('currentLang');
        if (currentFlag) {
            currentFlag.src = 'https://flagcdn.com/w40/' + this.flags[this.currentLang] + '.png';
        }
        if (currentLang) {
            currentLang.textContent = this.langNames[this.currentLang];
        }

        var self = this;
        var options = document.querySelectorAll('.lang-option');
        options.forEach(function(option) {
            option.classList.remove('active');
            if (option.getAttribute('data-lang') === self.currentLang) {
                option.classList.add('active');
            }
        });
    },

    translatePage: function(targetLang) {
        var self = this;
        var selectors = [
            'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
            'p', 'span', 'a', 'button', 'label',
            'li', 'td', 'th', 'option',
            '.textAll-p', '.titleAll', '.textSlideBigMain', '.textSlideSubMain',
            '.linkSlideBigMain', '.accordion-header', '.textRev',
            'input[placeholder]', 'textarea[placeholder]'
        ];
        
        var elements = document.querySelectorAll(selectors.join(', '));
        
        elements.forEach(function(el) {
            if (el.closest('script') || el.closest('style') || el.closest('.notranslate') || el.closest('.lang-dropdown')) return;
            if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                var placeholder = el.getAttribute('placeholder');
                if (placeholder && placeholder.length > 0) {
                    if (!el.getAttribute('data-original-placeholder')) {
                        el.setAttribute('data-original-placeholder', placeholder);
                    }
                    self.translateText(el.getAttribute('data-original-placeholder'), targetLang, function(translated) {
                        el.setAttribute('placeholder', translated);
                    });
                }
                return;
            }

            var dominated = false;
            var parent = el.parentElement;
            while (parent) {
                if (parent.getAttribute && parent.getAttribute('data-translating')) {
                    dominated = true;
                    break;
                }
                parent = parent.parentElement;
            }
            if (dominated) return;

            var text = '';
            var hasOnlyTextNodes = true;
            for (var i = 0; i < el.childNodes.length; i++) {
                if (el.childNodes[i].nodeType === 1 && el.childNodes[i].tagName !== 'BR') {
                    hasOnlyTextNodes = false;
                    break;
                }
            }

            if (hasOnlyTextNodes) {
                text = el.innerText.trim();
            } else if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                text = el.childNodes[0].textContent.trim();
            }

            if (text && text.length > 1 && text.length < 3000) {
                if (/^[\d\s\+\-\(\)\.\,\@\#\$\%\&\*\!\:\;\"\'\?\=\/\\\_\|\<\>\[\]\{\}]+$/.test(text)) return;
                if (/^https?:\/\//.test(text)) return;
                if (/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(text)) return;

                if (!el.getAttribute('data-original')) {
                    el.setAttribute('data-original', text);
                }
                el.setAttribute('data-translating', 'true');
                
                self.translateText(el.getAttribute('data-original'), targetLang, function(translated) {
                    if (hasOnlyTextNodes) {
                        el.innerText = translated;
                    } else if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                        el.childNodes[0].textContent = translated;
                    }
                    el.removeAttribute('data-translating');
                });
            }
        });
    },

    translateText: function(text, targetLang, callback) {
        var url = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=ru&tl=' + targetLang + '&dt=t&q=' + encodeURIComponent(text);
        
        fetch(url)
            .then(function(response) { return response.json(); })
            .then(function(data) {
                if (data && data[0]) {
                    var translated = '';
                    data[0].forEach(function(part) {
                        if (part[0]) translated += part[0];
                    });
                    if (translated && callback) {
                        callback(translated);
                    }
                }
            })
            .catch(function(err) {});
    },

    formatDates: function() {
        var locale = this.localeMap[this.currentLang] || 'ru-RU';
        var formatter = new Intl.DateTimeFormat(locale, { day: '2-digit', month: 'long', year: 'numeric' });
        var dates = document.querySelectorAll('.blog-date');
        dates.forEach(function(el) {
            var iso = el.getAttribute('data-date');
            if (!iso) return;
            var d = new Date(iso);
            if (isNaN(d.getTime())) return;
            el.textContent = formatter.format(d);
        });
    }
};

document.addEventListener('DOMContentLoaded', function() {
    siteTranslator.init();
});

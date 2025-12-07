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

    init: function() {
        var savedLang = localStorage.getItem('selectedLang') || 'ru';
        this.currentLang = savedLang;
        this.updateUI();
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
        var elements = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, a, span, button, label, li, td, th');
        var processed = [];

        elements.forEach(function(el) {
            if (el.closest('script') || el.closest('style') || el.closest('.notranslate') || el.closest('.lang-dropdown')) return;
            if (el.closest('header') && el.tagName === 'A') return;
            
            var dominated = false;
            for (var i = 0; i < processed.length; i++) {
                if (processed[i].contains(el)) {
                    dominated = true;
                    break;
                }
            }
            if (dominated) return;

            var dominated2 = false;
            for (var i = 0; i < processed.length; i++) {
                if (el.contains(processed[i])) {
                    dominated2 = true;
                    break;
                }
            }

            var text = '';
            if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                text = el.childNodes[0].textContent.trim();
            } else if (el.children.length === 0) {
                text = el.innerText.trim();
            }

            if (text && text.length > 1 && text.length < 3000 && !/^[\d\s\+\-\(\)\.\,\@\#\$\%\&\*\!]+$/.test(text)) {
                if (!el.getAttribute('data-original')) {
                    el.setAttribute('data-original', text);
                }
                processed.push(el);
                self.translateText(el.getAttribute('data-original'), targetLang, el);
            }
        });
    },

    translateText: function(text, targetLang, element) {
        var url = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=ru&tl=' + targetLang + '&dt=t&q=' + encodeURIComponent(text);
        
        fetch(url)
            .then(function(response) { return response.json(); })
            .then(function(data) {
                if (data && data[0]) {
                    var translated = '';
                    data[0].forEach(function(part) {
                        if (part[0]) translated += part[0];
                    });
                    if (translated && element) {
                        if (element.childNodes.length === 1 && element.childNodes[0].nodeType === 3) {
                            element.childNodes[0].textContent = translated;
                        } else {
                            element.innerText = translated;
                        }
                    }
                }
            })
            .catch(function(err) {});
    }
};

document.addEventListener('DOMContentLoaded', function() {
    siteTranslator.init();
});

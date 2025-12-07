var siteTranslator = {
    currentLang: 'ru',
    flags: {
        'ru': '🇷🇺',
        'en': '🇬🇧',
        'es': '🇪🇸',
        'pt': '🇵🇹',
        'zh': '🇨🇳'
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
        this.currentLang = lang;
        this.updateUI();
        if (lang === 'ru') {
            location.reload();
        } else {
            this.translatePage(lang);
        }
    },

    updateUI: function() {
        var currentFlag = document.getElementById('currentFlag');
        var currentLang = document.getElementById('currentLang');
        if (currentFlag) currentFlag.textContent = this.flags[this.currentLang];
        if (currentLang) currentLang.textContent = this.langNames[this.currentLang];

        var options = document.querySelectorAll('.lang-option');
        options.forEach(function(option) {
            option.classList.remove('active');
            if (option.getAttribute('data-lang') === this.currentLang) {
                option.classList.add('active');
            }
        }, this);
    },

    translatePage: function(targetLang) {
        var self = this;
        var elements = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, a, span, button, label, li, td, th, .textAll-p, .titleAll, .textSlideBigMain, .textSlideSubMain, .linkSlideBigMain');
        var textsToTranslate = [];
        var elementsMap = [];

        elements.forEach(function(el) {
            if (el.closest('script') || el.closest('style') || el.closest('.notranslate') || el.closest('.lang-dropdown')) return;
            if (el.children.length === 0 || (el.children.length > 0 && el.innerText === el.textContent)) {
                var text = el.innerText.trim();
                if (text && text.length > 0 && text.length < 5000) {
                    if (!el.getAttribute('data-original')) {
                        el.setAttribute('data-original', text);
                    }
                    textsToTranslate.push(el.getAttribute('data-original'));
                    elementsMap.push(el);
                }
            }
        });

        if (textsToTranslate.length === 0) return;

        var batchSize = 50;
        var batches = [];
        for (var i = 0; i < textsToTranslate.length; i += batchSize) {
            batches.push({
                texts: textsToTranslate.slice(i, i + batchSize),
                elements: elementsMap.slice(i, i + batchSize)
            });
        }

        batches.forEach(function(batch) {
            self.translateBatch(batch.texts, batch.elements, targetLang);
        });
    },

    translateBatch: function(texts, elements, targetLang) {
        var url = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=ru&tl=' + targetLang + '&dt=t';
        texts.forEach(function(text) {
            url += '&q=' + encodeURIComponent(text);
        });

        if (texts.length === 1) {
            fetch(url)
                .then(function(response) { return response.json(); })
                .then(function(data) {
                    if (data && data[0]) {
                        var translated = '';
                        data[0].forEach(function(part) {
                            if (part[0]) translated += part[0];
                        });
                        if (translated && elements[0]) {
                            elements[0].innerText = translated;
                        }
                    }
                })
                .catch(function(err) { console.log('Translation error:', err); });
        } else {
            texts.forEach(function(text, index) {
                var singleUrl = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=ru&tl=' + targetLang + '&dt=t&q=' + encodeURIComponent(text);
                fetch(singleUrl)
                    .then(function(response) { return response.json(); })
                    .then(function(data) {
                        if (data && data[0]) {
                            var translated = '';
                            data[0].forEach(function(part) {
                                if (part[0]) translated += part[0];
                            });
                            if (translated && elements[index]) {
                                elements[index].innerText = translated;
                            }
                        }
                    })
                    .catch(function(err) { console.log('Translation error:', err); });
            });
        }
    }
};

document.addEventListener('DOMContentLoaded', function() {
    siteTranslator.init();
});

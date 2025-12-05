ymaps.ready(init);

function init() {
    // Координаты площади Чкалова
    const targetCoords = [47.236694, 39.705069];

    // Создаём карту
    const myMap = new ymaps.Map("map", {
        center: targetCoords,
        zoom: 16,
        controls: ['zoomControl', 'routePanelControl'],
    });

    // Маркер с кастомным цветом
    const placemark = new ymaps.Placemark(targetCoords, {
        hintContent: 'Площадь Чкалова'
    }, {
        preset: 'islands#dotIcon',
        iconColor: '#FB6F58', // ваш цвет
    });

    myMap.geoObjects.add(placemark);

    // Панель маршрутов
    const routePanel = myMap.controls.get('routePanelControl');

    // Разрешаем выбор направления "откуда–куда"
    routePanel.routePanel.options.set({
        allowSwitch: true,
        reverseGeocoding: true,
    });

    // Устанавливаем точку назначения (площадь Чкалова)
    routePanel.routePanel.state.set({
        to: 'Площадь Чкалова, Ростов-на-Дону',
        toEnabled: false   // фиксируем конечную точку
    });

    // Добавляем построение маршрута по клику на карту
    myMap.events.add('click', function (e) {
        const coords = e.get('coords');
        routePanel.routePanel.state.set({
            from: coords
        });
    });

    // Авто-маршрут от геолокации пользователя (если доступна)
    ymaps.geolocation.get().then(function (res) {
        if (res.geoObjects.position) {
            routePanel.routePanel.state.set({
                from: res.geoObjects.position
            });
        }
    });
}

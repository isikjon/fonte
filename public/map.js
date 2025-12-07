ymaps.ready(init);

function init() {
    var mapElement = document.getElementById("map");
    if (!mapElement) return;

    var scrollPos = window.scrollY;

    var targetCoords = [47.236694, 39.705069];

    var myMap = new ymaps.Map("map", {
        center: targetCoords,
        zoom: 16,
        controls: ['zoomControl', 'routePanelControl'],
    }, {
        suppressMapOpenBlock: true
    });

    window.scrollTo(0, scrollPos);

    var placemark = new ymaps.Placemark(targetCoords, {
        hintContent: 'Площадь Чкалова'
    }, {
        preset: 'islands#dotIcon',
        iconColor: '#FB6F58',
    });

    myMap.geoObjects.add(placemark);

    var routePanel = myMap.controls.get('routePanelControl');

    routePanel.routePanel.options.set({
        allowSwitch: true,
        reverseGeocoding: true,
    });

    routePanel.routePanel.state.set({
        to: 'Площадь Чкалова, Ростов-на-Дону',
        toEnabled: false
    });

    myMap.events.add('click', function (e) {
        var coords = e.get('coords');
        routePanel.routePanel.state.set({
            from: coords
        });
    });

    setTimeout(function() {
        window.scrollTo(0, 0);
    }, 100);
}

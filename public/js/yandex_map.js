var getLong = 55.753994;
var getLatit = 37.622093;


function start(x, y) {
    ymaps.ready(init);
    if (x && y) {
        getLong = x
        getLatit = y
    }

    function init() {

        var myPlacemark,
            myMap = new ymaps.Map('map', {
                center: [getLong, getLatit],
                zoom: 9
            }, {
                searchControlProvider: 'yandex#search'
            });
        myPlacemark = createPlacemark([getLong, getLatit]);
        myMap.geoObjects.add(myPlacemark);
        getAddress([getLong, getLatit]);
        myMap.events.add('click', function(e) {
            var coords = e.get('coords');

            $('.latit_inp').val(coords[1])
            $('.longit_inp').val(coords[0])

            // Если метка уже создана – просто передвигаем ее.
            if (myPlacemark) {
                myPlacemark.geometry.setCoordinates(coords);
            }
            // Если нет – создаем.
            else {
                myPlacemark = createPlacemark(coords);
                myMap.geoObjects.add(myPlacemark);
                // Слушаем событие окончания перетаскивания на метке.
                myPlacemark.events.add('dragend', function() {
                    getAddress(myPlacemark.geometry.getCoordinates());
                });
            }
            getAddress(coords);
        });

        // Создание метки.
        function createPlacemark(coords) {
            return new ymaps.Placemark(coords, {
                iconCaption: 'поиск...'
            }, {
                preset: 'islands#violetDotIconWithCaption',
                draggable: true
            });
        }

        // Определяем адрес по координатам (обратное геокодирование).
        function getAddress(coords) {
            myPlacemark.properties.set('iconCaption', 'поиск...');
            ymaps.geocode(coords).then(function(res) {
                var firstGeoObject = res.geoObjects.get(0);
                $('.address_inp').val(firstGeoObject.getAddressLine())
                myPlacemark.properties
                    .set({
                        // Формируем строку с данными об объекте.
                        iconCaption: [
                            // Название населенного пункта или вышестоящее административно-территориальное образование.
                            firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                            // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                            firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                        ].filter(Boolean).join(', '),
                        // В качестве контента балуна задаем строку с адресом объекта.
                        balloonContent: firstGeoObject.getAddressLine()
                    });
            });
        }
    }
}
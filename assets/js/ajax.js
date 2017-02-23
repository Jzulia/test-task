var ajax = (function ajax() {

    var url = '/ajax/';

    return {

        init: function () {},

        loadCities: function () {

            $.ajax({
                method: 'post',
                url: url + 'cities/',
                data: {'region': $('#region').val()}
            }).done(function (html) {
                $('div.city').html(html);
                $('#city').chosen();
            });

        },

        loadAreas: function () {

            $.ajax({
                method: 'post',
                url: url + 'areas/',
                data: {'region': $('#region').val()}
            }).done(function (html) {
                $('div.area').html(html);
                $('#area').chosen();
            });

        },

    }

})();
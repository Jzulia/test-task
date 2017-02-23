var app = (function app() {

    return {

        init: function () {
            
            validation.init();
            
            $('#region').chosen();

            $('#region').on('change', function () {
                ajax.loadCities();
                $('.area').hide();
            });

            $('form').on('change', '#city', function () {
                ajax.loadAreas();
                $('.area').show();
            });

        },

    }

})();

app.init();
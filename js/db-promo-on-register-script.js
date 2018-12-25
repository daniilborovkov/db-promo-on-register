import Modal from '../node_modules/bootstrap/js/src/modal.js'
import '../scss/main.scss';
(function($) {
    function launchTimer() {
        setInterval(function time() {
            var d = new Date();
            var hours = 24 - d.getHours();
            var min = 60 - d.getMinutes();
            if ((min + '').length == 1) {
                min = '0' + min;
            }
            var sec = 60 - d.getSeconds();
            if ((sec + '').length == 1) {
                sec = '0' + sec;
            }
            $('#hour').html(hours);
            $('#min').html(min);
            $('#sec').html(sec);
        }, 1000);
    }
    $(document).ready(() => {
        $('#db_promo_on_register_prise').modal('show');
        launchTimer();
    });
})(jQuery);
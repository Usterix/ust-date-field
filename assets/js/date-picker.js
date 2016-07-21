(function ($) {
    'use strict';
    $(function () {
        var format = $('#ustDatePicker').data('format');
        $("#ustDatePicker").datepicker({
            dateFormat: format
        });
    });
})(jQuery);

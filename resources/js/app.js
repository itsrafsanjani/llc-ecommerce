require('./bootstrap');

require('alpinejs');

require('./bootstrap-notify.min');

// popper.js tooltip enabled
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

require('./custom')

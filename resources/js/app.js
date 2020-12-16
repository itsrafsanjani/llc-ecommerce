require('./bootstrap');

require('./bootstrap-notify.min')

// popper.js tooltip enabled
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

require('./custom')

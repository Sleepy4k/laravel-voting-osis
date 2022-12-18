// single placeholder
$(document).ready(function() {
    $(".select2-single").select2({
        placeholder: "Pilih Data",
        allowClear: true
    });
});

// multi placeholder
$(document).ready(function() {
    $(".select2-multiple").select2({
        placeholder: "Pilih Data",
        allowClear: true
    });
});
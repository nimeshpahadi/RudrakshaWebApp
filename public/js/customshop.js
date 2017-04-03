$(document).ready(function () {



    $("#country_code").on('change',function () {
        var code = countryCode[$(this).val()];
        document.getElementById("country_dial").innerHTML = code;
    });




});


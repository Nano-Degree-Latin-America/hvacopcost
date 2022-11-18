$(document).ready(function () {

    $('#logoEmpresa').on("load", function () {
        $('#loader').hide();
        $('#blur').removeClass('blur');
        $('#footer').removeClass('blur');
    });
    setLogo();  
    $('.banner').hover(function(){
        $('.lbl-banner').removeClass('hidden');
    }, function() {
        $('.lbl-banner').addClass('hidden');
      });
})

function setLogo() {
    $.ajax({
        type: 'POST',
        url: '/getLogo',
        dataType: 'json',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            $('#logoEmpresa').attr("src", "assets/images/logos/" + response);;
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
    $('#logoEmpresa').attr("src", "assets/images/logos/Administrador20210322133256.png");
}
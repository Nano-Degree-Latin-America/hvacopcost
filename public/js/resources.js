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
            $('#logoEmpresa').attr("src", "assets/images/" + response);;
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
    $('#logoEmpresa').attr("src", "assets/images/Logo-NDL_blanco_marca-r.png");
}

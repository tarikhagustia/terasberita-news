/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 *
 */
function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Daftar dengan');
    });
    $('.error').removeClass('alert alert-danger').html('');

}
function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');
        });

        $('.modal-title').html('Masuk dengan');
    });
     $('.error').removeClass('alert alert-danger').html('');
}

function openLoginModal(){
    showLoginForm();
    setTimeout(function(){
        $('#loginModal').modal('show');
    }, 230);

}
function openRegisterModal(){
    showRegisterForm();
    setTimeout(function(){
        $('#loginModal').modal('show');
    }, 230);

}

function loginAjax(){
    var datas = $('form[id=ajaxForm]').serializeArray();
    $.ajax({
        url: 'Auth/checkLoginAjax',
        type: 'POST',
        dataType: 'JSON',
        data: datas,
    })
    .done(function(response) {
        if(response.valid == false){
            shakeModal(response.msg,response.valid_msg);
        }else{
            loginSuccess(response.msg);
            location.reload();
        }
    })
    .fail(function() {
        alert('Error')
    })
    .always(function() {

    });

    // $.post( "/Auth/checkLoginAjax", function( data ) {
    //         if(data == 1){
    //             window.location.replace("/home");
    //         } else {

    //         }
    // });


/*   Simulate error message from the server   */
     // shakeModal();
}
function registerAjax(){
    var datas = $('form[id=ajaxForm2]').serializeArray();
    $.ajax({
        url: 'Auth/checkLoginUsers',
        type: 'POST',
        dataType: 'JSON',
        data: datas,
    })
    .done(function(response) {
         if(response.valid == false){
            registerSuccess(response.valid_msg)
        }else{
            loginSuccess(response.msg);
            location.reload();
        }

    })
    .fail(function() {
        alert('Error')
    })
    .always(function() {

    });
}
function registerAjaxButtom(){
    var datas = $('form[id=ajaxForm22]').serializeArray();
    $.ajax({
        url: 'Auth/checkLoginUsers',
        type: 'POST',
        dataType: 'JSON',
        data: datas,
    })
    .done(function(response) {
         if(response.valid == false){
            // alert(response.valid_msg);
            alert(response.valid_msg.replace(/(<([^>]+)>)/ig,""));
        }else{
            alert(response.msg);
            location.reload();
        }

    })
    .fail(function() {
        alert('Error')
    })
    .always(function() {

    });
}
function shakeModal(msg, msg2){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html(msg + msg2);
             $('input[type="password"]').val('');
             setTimeout( function(){
                $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000 );
}
function loginSuccess(msg){
    $('.error').removeClass('alert alert-success');
    $('.error').addClass('alert alert-success').html(msg);
}
function registerSuccess(msg){
    $('.error-register').removeClass('alert alert-success');
    $('.error-register').addClass('alert alert-success').html(msg);
}

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
        $('.modal-title').html('Register with');
    }); 
    $('.error').removeClass('alert alert-danger').html('');
       
}
function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');    
        });
        
        $('.modal-title').html('Login with');
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
            shakeModal(response.msg); 
        }else{
            alert('Success');

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

function shakeModal(msg){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html(msg);
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}

   
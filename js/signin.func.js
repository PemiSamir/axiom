$(document).ready(function(){
    //au focus
    $('.field-input').focus(function(){
        $(this).parent().addClass('is-focus has-label');
    });

    //à la perte du focus
    $('.field-input').blur(function(){
        $parent = $(this).parent();
        if($(this).val()==''){
            $parent.removeClass('has-label');
        }
        $parent.removeClass('is-focus');
    });

    //si un champ est rempli directement la class has-label
    $('.field-input').each(function(){
        if($(this).val() != ''){
            $(this).parent().addClass('has-label');
        }
    });

    $('#logForm').submit(function(){
        var email = $('#email').val();
        var password = $('#password').val();
        var result;

        if(email==""){
            $('#email').parent().addClass('is-focused error');
            result = false;
        }

        if(password==""){
            $('#password').parent().addClass('is-focused error');
            result = false;
        }

        return result;
    });

   $('#email').keyup(function(){
        if($('#email').val() == ""){
            $('#email').parent().addClass('is-focused error');
        }else{
            $('#email').parent().removeClass('is-focused error');
        }
    });

    $('#password').keyup(function(){
        if($('#password').val() == ""){
            $('#password').parent().addClass('is-focused error');
        }else{
            $('#password').parent().removeClass('is-focused error');
        }
    });

});
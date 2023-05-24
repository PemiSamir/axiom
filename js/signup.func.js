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

    $('#regForm').submit(function(){
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var copassw = $('#copassword').val();

        var result = true;

        if(name==""){
            $('#name').parent().addClass('is-focused error');
            result = false;
        }

        if(email==""){
            $('#email').parent().addClass('is-focused error');
            result = false;
        }

        if(password==""){
            $('#password').parent().addClass('is-focused error');
            result = false;
        }

        if(copassw==""){
            $('#copassword').parent().addClass('is-focused error');
            result = false;
        }

        if(copassw != password){
            $('#password').parent().addClass('is-focused error');
            $('#copassword').parent().addClass('is-focused error');
            result = false;
        }

        return result;
    });

    $('#name').keyup(function(){
        if($('#name').val() == ""){
            $('#name').parent().addClass('is-focused error');
        }else{
            $('#name').parent().removeClass('is-focused error');
        }
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

    $('#copassword').keyup(function(){
        if($('#copassword').val() == ""){
            $('#copassword').parent().addClass('is-focused error');
        }else{
            $('#copassword').parent().removeClass('is-focused error');
        }
    });
});
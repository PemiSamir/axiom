$(document).ready(function(){

    recupMessage();

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

    $('#send').click(function(){
        var message = $('#message').val();

        if(message != ""){
            $.post('ajax/post.php', {message:message},function(){
                recupMessage();
                $('#message').val("");
            });
        }
    });

    function recupMessage(){
        $.post('ajax/recup.php',function(data){
            $('.messages-box').html(data);
        });
    }

    setInterval(recupMessage,1000);

});
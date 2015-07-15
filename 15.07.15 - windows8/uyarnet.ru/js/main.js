function connect() {
    
    c_name=$('#ff-fio').val();
    c_phone=$('#ff-phone').val();
    c_adress=$('#ff-adress').val();
    c_porch=$('#ff-porch').val();
    c_floor=$('#ff-floor').val();    
    if ((c_name=='')||(c_phone=='')||(c_porch=='')||(c_adress=='')||(c_floor==''))
    {//Одно из полей не заполнено
        $('#err').html('<span style="color:red">Заполните все поля</span>');
    }
    else 
    {//Все поля заполнены
        $.ajax({ url: "/connect.php", type: "POST", data: {name:c_name,phone:c_phone,adress:c_adress,porch:c_porch,floor:c_floor}, success: function(msg){ 
            if (msg=='true')
            {
                $('#content').html('<h1>Ваше сообщение отправлено успешно</h1><p>В ближайшее время наши менеджеры обработают его.</p>');
            }
            else
            {
                $('#err').html('<span style="color:red">Ошибка. Свяжитесь с администрацией сайта.</span>')
            }
        }});
        /*$.getJSON('connect.php',{name:c_name,phone:c_phone,adress:c_adress,porch:c_porch,floor:c_floor},function(ok){
           if (ok.msg=='true')
           {
                $('#content').html('<h1>Ваше сообщение отправлено успешно</h1><p>В ближайшее время наши менеджеры обработают его.</p>');
           }
           else
           {
                $('#err').html('<span style="color:red">Ошибка. Свяжитесь с администрацией сайта.</span>')
           }
          ;          
        })*/
    }    
}

function techhelp() {
    t_name=$('#ff-fio').val();
    t_email=$('#ff-email').val();
    t_phone=$('#ff-phone').val();
    t_number=$('#ff-number').val();
    t_message=$('#ff-message').val();
    if ((t_name=='')||(t_email=='')||(t_phone=='')||(t_number=='')||(t_message==''))
    {//Одно из полей не заполнено
        $('#err').html('<span style="color:red">Заполните все поля</span>');
    }
    else 
    {//Все поля заполнены
        $.ajax({ url: "/techhelp.php", type: "POST", data: {name:t_name,email:t_email,phone:t_phone,number:t_number,message:t_message}, success: function(msg){ 
            if (msg=='true')
            {
                $('#content').html('<h1>Ваше сообщение отправлено успешно</h1><p>В ближайшее время наши менеджеры обработают его.</p>');
            }
            else
            {
                $('#err').html('<span style="color:red">Ошибка. Свяжитесь с администрацией сайта.</span>')
            }
        }});
        /*$.getJSON('techhelp.php',{name:name,phone:phone,number:number,message:message},function(ok){
            if (ok.msg=='true')
            {
                $('#content').html('<h1>Ваше сообщение отправлено успешно</h1><p>В ближайшее время наши менеджеры обработают его.</p>');
            }
            else
            {
                $('#err').html('<span style="color:red">Ошибка. Свяжитесь с администрацией сайта.</span>')
            }
        });*/
    }    
}
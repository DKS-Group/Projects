$(document).ready(function(){	
	// Отправка сообщения
	$('#m_form button').click(function(){
	
		var m_name = $('#m_name').val();
		var m_email = $('#m_email').val();
		var m_theme = $('#m_theme').val();
		var m_message = $('#m_message').val();

		$('#result').html('<img src="images2/loading.gif" alt="" />');
		$.post('includes2/sendmail2.php', { 'm_name': m_name, 'm_email': m_email, 'm_theme': m_theme, 'm_message':m_message}, function(data){
				$('#m_form #result').html(data);
	   }); 
	});
});
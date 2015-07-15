$(document).ready(function(){	
	// Отправка сообщения
	$('#m_form button').click(function(){
	
		var m_name = $('#m_name').val();
		var m_tel = $('#m_tel').val();
		var m_adress = $('#m_adress').val();
		var m_etaj = $('#m_etaj').val();
		$('#result').html('<img src="images/loading.gif" alt="" />');
		$.post('includes/sendmail.php', { 'm_name': m_name, 'm_tel': m_tel, 'm_adress': m_adress, 'm_etaj':m_etaj}, function(data){
				$('#m_form #result').html(data);
	   }); 
	});
});
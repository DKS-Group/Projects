<?php $args = array(
	'avatar_size'       => 65,
	'reply_text'       => 'Ответить',
	'callback'          => 'mytheme_comment',
); ?>


<?php 
if (!comments_open())
{
	echo "<p class='nocomments'>Комментарии запрещены</p>";
}
else
{
    if (!get_comments_number())
    	{
        	echo "<p class='nocomments'></p>";
    }
    else {
    	?>

    		<ul>
				<?php wp_list_comments($args); ?>
			</ul>

    	<?php
    }
}
?>



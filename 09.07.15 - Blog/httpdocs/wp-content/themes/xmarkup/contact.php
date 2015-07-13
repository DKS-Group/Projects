<?php
/*
Template Name: Contact
*/
?>

<?php get_header();?>

<?php

 if(isset($_POST['submitted'])) {
    if(trim($_POST['contact_name']) === '') {
        $nameError = 'Введите ваше имя';
        $hasError = true;
    } else {
        $name = trim($_POST['contact_name']);
    }

    if(trim($_POST['contact_email']) === '')  {
        $emailError = 'Введите e-mail адрес';
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['contact_email']))) {
        $emailError = 'Вы ввели неправильный адрес.';
        $hasError = true;
    } else {
        $email = trim($_POST['contact_email']);
    }

    if(trim($_POST['contact_theme']) === '') {
        $themeError = 'Введите тему ';
        $hasError = true;
    } else {
        $theme = trim($_POST['contact_theme']);
    }

    if(trim($_POST['contact_comments']) === '') {
        $commentError = 'Введите сообщение';
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['contact_comments']));
        } else {
            $comments = trim($_POST['contact_comments']);
        }
    }

    if(!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '') ){
            $emailTo = get_option('admin_email');
        }
        $subject = 'Сообщение с сайта от '.$name;
        $body = "Имя: $name \n\nE-mail: $email \n\nТема: $theme \n\nСообщение: $comments";
        $headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }

} ?>
	
<section id="content"><!-- content -->
	<div class="wrapper">
		<article id="main_content">
		<div class="mainphoto-page"><?php if(has_post_thumbnail( )){the_post_thumbnail('article_main_photo');}?></div>
			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php the_content(); ?>

                      <div id="contact_form">
                           <?php if(isset($emailSent) && $emailSent == true) { ?>
                                 <div class="contact_message">Ваше сообщение успешно отправлено!!</div>
                           <?php } else { ?>
                                 <?php if(isset($hasError) || isset($captchaError)) { ?>

                                 <?php } ?>

                                 <form action="<?php the_permalink(); ?>" id="contactForm" method="post">

                                       <div class="contact_left">
                                            <div class="contact_name">
                                                 <input type="text" placeholder="Ваше имя" name="contact_name" id="contact_name" value="<?php if(isset($_POST['contact_name'])) echo $_POST['contact_name'];?>" class="required requiredField" />
                                                 <?php if($nameError != '') { ?>
                                                       <div class="errors"><?=$nameError;?></div>
                                                 <?php } ?>
                                            </div>
                                            <div class="contact_email">
                                                 <input type="text" placeholder="Ваш email" name="contact_email" id="contact_email" value="<?php if(isset($_POST['contact_email']))  echo $_POST['contact_email'];?>" class="required requiredField email" />
                                                 <?php if($emailError != '') { ?>
                                                       <div class="errors"><?=$emailError;?></div>
                                                 <?php } ?>
                                            </div>
                                            <div class="contact_theme">
                                                 <input type="text" placeholder="Тема" name="contact_theme" id="contact_theme" value="<?php if(isset($_POST['contact_theme'])) echo $_POST['contact_theme'];?>" class="required requiredField" />
                                                 <?php if($themeError != '') { ?>
                                                       <div class="errors"><?=$themeError;?></div>
                                                 <?php } ?>
                                            </div>
                                       </div>

                                       <div class="contact_right">
                                            <div class="contact_textarea">
                                                 <textarea placeholder="Сообщение" name="contact_comments" id="commentsText" rows="1" cols="1" class="required requiredField"><?php if(isset($_POST['contact_comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['contact_comments']); } else { echo $_POST['contact_comments']; } } ?></textarea>
                                                 <?php if($commentError != '') { ?>
                                                       <div class="errors"><?=$commentError;?></div>
                                                 <?php } ?>
                                            </div>

                                            <button type="contsubmit" class="contact_submit">Отправить</button>
                                            <input type="hidden" name="submitted" id="submitted" value="true" />
                                       </div>
                                 </form>
                           <?php } ?>
                      </div>


			<?php endwhile; ?>
		</article>
		<?php get_sidebar(); ?>
		<div class="c-b"></div>	
</section>	
	</div><!--End .wrapper-->
</section><!--End #content-->
<?php get_footer();?>
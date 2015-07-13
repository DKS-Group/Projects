<?php
ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
    <title><?php echo $this->scope["pageTitle"];?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="<?php echo $this->scope["htmlJs"];?>nagvis.js"></script>
    <script type="text/javascript" src="<?php echo $this->scope["htmlJs"];?>frontendMessage.js"></script>
    <script type="text/javascript" src="<?php echo $this->scope["htmlJs"];?>frontendEventlog.js"></script>
    <script type="text/javascript" src="<?php echo $this->scope["htmlJs"];?>ajax.js"></script>
    <script type="text/javascript" src="<?php echo $this->scope["htmlJs"];?>frontend.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->scope["htmlTemplates"];?>default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->scope["htmlTemplates"];?>default.login.css" id="login-css"  media="all" />
    <link rel="shortcut icon" href="<?php echo $this->scope["htmlBase"];?>/frontend/nagvis-js/images/internal/favicon.png" />
    <meta name='robots' content='noindex,nofollow' />
    <script type="text/javascript">
    oGeneralProperties = <?php echo $this->scope["generalProperties"];?>;
    oLocales = <?php echo $this->scope["locales"];?>;

    function checkCookies() {
        // Would rather use navigator.cookieEnabled but this is not very reliable
        document.cookie = "_testcookie";
        var iLikeCookies = (document.cookie.indexOf("_testcookie") != -1) ? true : false;

        if(!iLikeCookies)
            frontendMessage({'type': 'CRITICAL', 'message': '<?php echo $this->scope["langTextCookiesDisabled"];?>', 'title': '<?php echo $this->scope["langTitleCookiesDisabled"];?>'});
        else {
            var d = new Date();
            document.cookie = "_testcookie;expires=" + d.toGMTString() + ";" + ";";
        }
    }
    </script>
</head>
<body class="login">

<div id="login">
<h1><a href="#" title="<?php echo $this->scope["pageTitle"];?>" style="background-image:url(<?php echo $this->scope["htmlImages"];?>internal/logo.png)"><?php echo $this->scope["pageTitle"];?></a></h1>

<form name="loginform" id="loginform" action="<?php echo $this->scope["formTarget"];?>" method="post">
    <?php if ((isset($this->scope["loginMsg"]) ? $this->scope["loginMsg"] : null) != '') {
?><p class="msg">
    <strong>Error:</strong> <?php echo $this->scope["loginMsg"];?>

    </p><?php 
}?>

    <p>
        <label><?php echo $this->scope["langName"];?><br />
        <input type="text" name="_username" id="user_login" class="input" value="" size="<?php echo $this->scope["maxUsernameLength"];?>" tabindex="10" /></label>
    </p>
    <p>
        <label><?php echo $this->scope["langPassword"];?><br />
        <input type="password" name="_password" id="user_pass" class="input" value="" size="<?php echo $this->scope["maxPasswordLength"];?>" tabindex="20" /></label>

    </p>
    <p class="submit">
        <input type="submit" name="submit" id="submit" value="<?php echo $this->scope["langLogin"];?>" tabindex="100" />
    </p>
</form>
</div>

<script type="text/javascript">
try{document.getElementById('user_login').focus();}catch(e){}; checkCookies();
</script>
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
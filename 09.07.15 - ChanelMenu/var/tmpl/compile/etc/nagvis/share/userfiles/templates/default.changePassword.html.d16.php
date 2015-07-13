<?php
ob_start(); /* template body */ ?><div id="changePassword">
<form name="changePassword" id="changePasswordForm" action="#" onsubmit="submitFrontendForm('<?php echo $this->scope["formTarget"];?>', 'changePasswordForm');return false" method="POST">
<table name="mytable" class="mytable" id="table_create_image">
    <tr>
        <td class="tdlabel"><?php echo $this->scope["langOldPassword"];?></td>
        <td class="tdfield"><input type="password" name="passwordOld" id="passwordOld" class="input" value="" size="<?php echo $this->scope["maxPasswordLength"];?>" tabindex="10" /></td>
    </tr>
    <tr>
        <td class="tdlabel"><?php echo $this->scope["langNewPassword1"];?></td>
        <td class="tdfield"><input type="password" name="passwordNew1" id="passwordNew1" class="input" value="" size="<?php echo $this->scope["maxPasswordLength"];?>" tabindex="20" /></td>
    </tr>
    <tr>
        <td class="tdlabel"><?php echo $this->scope["langNewPassword2"];?></td>
        <td class="tdfield"><input type="password" name="passwordNew2" id="passwordNew2" class="input" value="" size="<?php echo $this->scope["maxPasswordLength"];?>" tabindex="30" /></td>
    </tr>
    <tr><td class="tdlabel" colspan="2" align="center"><input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langChangePassword"];?>" tabindex="100" /></td></tr>
</form>
</div>
<script type="text/javascript">
try{document.getElementById('passwordOld').focus();}catch(e){}
</script>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
<?php
ob_start(); /* template body */ ?><input type="hidden" /><!-- The template must not start with a script tag. This would be ignored by IE //-->
<script type="text/javascript">
validMainConfig = <?php echo $this->scope["validMainCfg"];?>;
lang = <?php echo $this->scope["lang"];?>;
</script>
<script type="text/javascript" src="<?php echo $this->scope["htmlBase"];?>/frontend/nagvis-js/js/ManageBackends.js"></script>
<form name="backend_default" id="backend_default" method="POST" action="javascript:submitFrontendForm('<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=MainCfg&amp;act=doBackendDefault', 'backend_default');">
    <table name="mytable" class="mytable" id="table_backend_default">
        <tr><th class="cat" colspan="2"><h2><?php echo $this->scope["langSetDefaultBackend"];?></h2></th></tr>
        <tr>
            <td class="tdlabel"><?php echo $this->scope["langDefaultBackend"];?></td>
            <td class="tdfield">
                <select name="defaultbackend" onChange="" onBlur="" required>
                    <?php 
$_fh0_data = (isset($this->scope["definedBackends"]) ? $this->scope["definedBackends"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['backendId'])
	{
/* -- foreach start output */
?>
                        <?php if ((isset($this->scope["backendId"]) ? $this->scope["backendId"] : null) == (isset($this->scope["defaultBackend"]) ? $this->scope["defaultBackend"] : null)) {
?>
                            <option value="<?php echo $this->scope["backendId"];?>" selected><?php echo $this->scope["backendId"];?></option>
                        <?php 
}
else {
?>
                            <option value="<?php echo $this->scope["backendId"];?>"><?php echo $this->scope["backendId"];?></option>
                        <?php 
}?>

                    <?php 
/* -- foreach end output */
	}
}?>

                </select>
            </td>
        </tr>
        <tr>
            <td class="tdlabel" colspan="2" align="center">
                <input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langSave"];?>" />
            </td>
        </tr>
    </table>
</form>

<?php if ((isset($this->scope["someNotEditable"]) ? $this->scope["someNotEditable"] : null)) {
?><p><?php echo $this->scope["langSomeNotEditable"];?></p><?php 
}?>


<form name="backend_add" id="backend_add" method="POST" action="javascript:submitFrontendForm('<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=MainCfg&amp;act=doBackendAdd', 'backend_add');" onsubmit="return check_backend_add();">
    <table name="mytable" class="mytable" id="table_backend_add">
        <tr>
            <th class="cat" colspan="2"><h2><?php echo $this->scope["langAddBackend"];?></h2></th>
        </tr>
        <tr>
            <td class="tdlabel">backendid</td>
            <td class="tdfield"><input type="text" name="backendid" value="" required /></td>
        </tr>
        <tr>
            <td class="tdlabel">backendtype</td>
            <td class="tdfield">
                <select name="backendtype" onChange="updateBackendOptions(this.value, '', 'backend_add');" required>
                    <?php 
$_fh1_data = (isset($this->scope["availableBackends"]) ? $this->scope["availableBackends"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['type'])
	{
/* -- foreach start output */
?><option value="<?php echo $this->scope["type"];?>"><?php echo $this->scope["type"];?></option><?php 
/* -- foreach end output */
	}
}?>

                </select>
            </td>
        </tr>
        <tr>
            <td class="tdlabel" colspan="2" align="center">
                <input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langSave"];?>" />
            </td>
        </tr>
    </table>
</form>

<form name="backend_edit" id="backend_edit" method="POST" action="javascript:submitFrontendForm('<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=MainCfg&amp;act=doBackendEdit', 'backend_edit');" onsubmit="return check_backend_edit();">
    <input type="hidden" name="backendtype" value="" />
    <table name="mytable" class="mytable" id="table_backend_edit">
        <tr><th class="cat" colspan="2"><h2><?php echo $this->scope["langEditBackend"];?></h2></th></tr>
        <tr>
            <td class="tdlabel">backendid</td>
            <td class="tdfield">
                <select name="backendid" onChange="updateBackendOptions('', this.value, 'backend_edit');" required>
                    <?php 
$_fh2_data = (isset($this->scope["editableBackends"]) ? $this->scope["editableBackends"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['backendId'])
	{
/* -- foreach start output */
?><option value="<?php echo $this->scope["backendId"];?>"><?php echo $this->scope["backendId"];?></option><?php 
/* -- foreach end output */
	}
}?>

                </select>
            </td>
        </tr>
        <tr>
            <td class="tdlabel" colspan="2" align="center">
                <input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langSave"];?>" />
            </td>
        </tr>
    </table>
</form>

<form name="backend_del" id="backend_del" method="POST" action="javascript:submitFrontendForm('<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=MainCfg&amp;act=doBackendDel', 'backend_del');" onsubmit="return check_backend_del();">
    <table name="mytable" class="mytable" id="table_backend_del">
        <tr><th class="cat" colspan="2"><h2><?php echo $this->scope["langDelBackend"];?></h2></th></tr>
        <tr>
            <td class="tdlabel">backendid</td>
            <td class="tdfield">
                <select name="backendid" required>
                    <?php 
$_fh3_data = (isset($this->scope["editableBackends"]) ? $this->scope["editableBackends"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['backendId'])
	{
/* -- foreach start output */
?><option value="<?php echo $this->scope["backendId"];?>"><?php echo $this->scope["backendId"];?></option><?php 
/* -- foreach end output */
	}
}?>

                </select>
            </td>
        </tr>
        <tr>
            <td class="tdlabel" colspan="2" align="center">
                <input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langDelete"];?>" />
            </td>
        </tr>
    </table>
</form>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
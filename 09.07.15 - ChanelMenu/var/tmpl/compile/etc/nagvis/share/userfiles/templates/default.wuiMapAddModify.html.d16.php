<?php
ob_start(); /* template body */ ?><form name="addmodify" id="addmodify"  action="javascript:submitFrontendForm2('<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=Map&amp;act=addModify&amp;show=<?php echo $this->scope["show"];?>', 'addmodify');" enctype="">

<?php if ((isset($this->scope["successMsg"]) ? $this->scope["successMsg"] : null) != '') {
?><div class=success><?php echo $this->scope["successMsg"];?></div>
<script type="text/javascript">
document.getElementById('commit').disabled = true;
window.setTimeout(function() { window.location.reload(); }, <?php echo $this->scope["reloadTime"];?>*1000);
</script>
<?php 
}
elseif ((isset($this->scope["addParams"]) ? $this->scope["addParams"] : null) != '' && (isset($this->scope["addParams"]) ? $this->scope["addParams"] : null) != '{}') {
?><script type="text/javascript">
document.getElementById('commit').disabled = true;
window.setTimeout(function() { window.location.href = makeuri(<?php echo $this->scope["addParams"];?>); }, <?php echo $this->scope["reloadTime"];?>*1000);
</script><?php 
}?>


<table name="mytable" class="mytable" id="table_addmodify">
    <?php 
$_fh0_data = (isset($this->scope["attrs"]) ? $this->scope["attrs"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['key']=>$this->scope['value'])
	{
/* -- foreach start output */
?><input type="hidden" id="<?php echo $this->scope["key"];?>" name="<?php echo $this->scope["key"];?>" value="<?php echo $this->scope["value"];?>" /><?php 
/* -- foreach end output */
	}
}?>

<?php echo $this->scope["formContents"];?>

    <?php if ((isset($this->scope["mode"]) ? $this->scope["mode"] : null) == 'view_params') {
?><tr><td colspan=3 style="height:10px;"></td></tr>
    <tr>
        <td class=tdlabel><?php echo $this->scope["langPermanent"];?></td>
        <td class=tdbox></td>
        <td class=tdfield>
            <input class="checkbox" type="checkbox" name="perm" value="1" /><?php echo $this->scope["langForAll"];?><br />
            <input class="checkbox" type="checkbox" name="perm_user" value="1" /><?php echo $this->scope["langForYou"];?>

        </td>
    </tr><?php 
}?>

    <tr>
        <td class="tdlabel" colspan="3" align="center">
            <input class="submit" type="submit" name="submit" id="commit" value="<?php echo $this->scope["langSave"];?>" />
        </td>
    </tr>
</table>
</form>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
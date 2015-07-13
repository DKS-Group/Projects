<?php
ob_start(); /* template body */ ?><input type="hidden" /><!-- The template must not start with a script tag. This would be ignored by IE //-->
<script type="text/javascript">
lang = <?php echo $this->scope["lang"];?>;
</script>
<script type="text/javascript" src="<?php echo $this->scope["htmlBase"];?>/frontend/nagvis-js/js/ManageShapes.js"></script>

<form name="shape_add" id="shape_add" method="POST" action="<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=ManageShapes&amp;act=doUpload" enctype="multipart/form-data" onsubmit="return check_image_add();">
<table name="mytable" class="mytable" id="table_shape_add">
    <tr><th class="cat" colspan="2"><h2><?php echo $this->scope["langUploadShape"];?></h2></th></tr>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <tr><td class="tdlabel"><?php echo $this->scope["langChoosePngImage"];?></td>
    <td class="tdfield"><input class="upload" type="file" name="image_file" value="" /></td></tr>
    <tr><td class="tdlabel" colspan="2" align="center"><input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langUpload"];?>" /></td></tr>
</table>
</form>

<form name="shape_delete" id="shape_delete" method="POST" action="javascript:submitFrontendForm('<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=ManageShapes&amp;act=doDelete', 'shape_delete');" enctype="" onsubmit="return check_image_delete();">
<table name="mytable" class="mytable" id="table_shape_delete">
    <tr><th class="cat" colspan="2"><h2><?php echo $this->scope["langDeleteShape"];?></h2></th></tr>
    <tr>
        <td class="tdlabel"><?php echo $this->scope["langChoosePngImage"];?></td>
        <td class="tdfield">
            <select name="image" onChange="" onBlur="">
                <option value=""></option>
                <?php 
$_fh0_data = (isset($this->scope["shapes"]) ? $this->scope["shapes"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['shape'])
	{
/* -- foreach start output */
?>
                <option value="<?php echo $this->scope["shape"];?>"><?php echo $this->scope["shape"];?></option>
                <?php 
/* -- foreach end output */
	}
}?>

            </select>
        </td>
    </tr>
    <tr><td class="tdlabel" colspan="2" align="center"><input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langDelete"];?>" /></td></tr>
</table>
</form>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
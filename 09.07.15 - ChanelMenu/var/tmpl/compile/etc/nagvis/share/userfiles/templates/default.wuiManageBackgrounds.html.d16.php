<?php
ob_start(); /* template body */ ?><input type="hidden" /><!-- The template must not start with a script tag. This would be ignored by IE //-->
<script type="text/javascript">
lang = <?php echo $this->scope["lang"];?>;
</script>
<script type="text/javascript" src="<?php echo $this->scope["htmlBase"];?>/frontend/nagvis-js/js/ManageBackgrounds.js"></script>
<form name="create_image" id="create_image" method="POST" action="javascript:submitFrontendForm('<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=ManageBackgrounds&amp;act=doCreate', 'create_image');" enctype="" onsubmit="return check_image_create();">
    <table name="mytable" class="mytable" id="table_create_image">
        <tr><th class="cat" colspan="2"><h2><?php echo $this->scope["langCreateBackground"];?></h2></th></tr>
        <tr class="must"><td class="tdlabel"><?php echo $this->scope["langBackgroundName"];?></td><td class="tdfield"><input type="text" name="image_name" value="" onBlur="" /></td></tr>
        <tr class="must">
          <td class="tdlabel"><?php echo $this->scope["langBackgroundColor"];?></td>
          <td class="tdfield">
            <div id="image_color_container" class="picker">
            <input type="text" id="image_color" name="image_color" value="#" /><a href="javascript:void(0);" onClick="togglePicker('image_color');"><img src="<?php echo $this->scope["htmlImages"];?>/internal/picker.png" alt="<?php echo $this->scope["langColorSelect"];?>" /></a></div>
            <script type="text/javascript">
            var o = document.getElementById('image_color');
            o.color = new jscolor.color(o, {pickerOnfocus:false,adjust:false,hash:true});
            o = null;
            </script>
            </td>
        </tr>
        <tr class="must"><td class="tdlabel"><?php echo $this->scope["langBackgroundWidth"];?></td><td class="tdfield"><input type="text" name="image_width" value="" onBlur="" /></td></tr>
        <tr class="must"><td class="tdlabel"><?php echo $this->scope["langBackgroundHeight"];?></td><td class="tdfield"><input type="text" name="image_height" value="" onBlur="" /></td></tr>
        <tr><td class="tdlabel" colspan="2" align="center"><input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langCreate"];?>" /></td></tr>
    </table>
</form>

<form name="new_image" id="new_image" method="POST" action="<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=ManageBackgrounds&amp;act=doUpload" enctype="multipart/form-data" onsubmit="return check_image_add();">
    <table name="mytable" class="mytable" id="table_new_image">
        <tr><th class="cat" colspan="2"><h2><?php echo $this->scope["langUploadBackground"];?></h2></th></tr>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
        <tr><td class="tdlabel" ><?php echo $this->scope["langChooseImage"];?></td><td class="tdfield"><input class="upload" type="file" name="image_file" value="" /></td></tr>
        <tr><td class="tdlabel" colspan="2" align="center"><input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langUpload"];?>" /></td></tr>
    </table>
</form>

<form name="image_delete" id="image_delete" method="POST" action="javascript:submitFrontendForm('<?php echo $this->scope["htmlBase"];?>/server/core/ajax_handler.php?mod=ManageBackgrounds&amp;act=doDelete', 'image_delete');" enctype="" onsubmit="return check_image_delete();">
    <table name="mytable" class="mytable" id="table_image_delete">
        <tr><th class="cat" colspan="2"><h2><?php echo $this->scope["langDeleteBackground"];?></h2></th></tr>
        <tr>
            <td class="tdlabel"><?php echo $this->scope["langChooseImage"];?></td><td class="tdfield">
                <select name="map_image" onChange="" onBlur="">
                    <option value=""></option>
                    <?php 
$_fh0_data = (isset($this->scope["images"]) ? $this->scope["images"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['image'])
	{
/* -- foreach start output */
?>
                    <option value="<?php echo $this->scope["image"];?>"><?php echo $this->scope["image"];?></option>
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
<?php
ob_start(); /* template body */ ?><div id="search">
<input type="text" name="highlightInput" id="highlightInput" onkeypress="searchObjectsKeyCheck(this.value, event)" autofocus />
<input class="submit" type="button" name="submit" value="<?php echo $this->scope["langSearch"];?>" onclick="searchObjects(document.getElementById('highlightInput').value)" />
<script type="text/javascript">
try{document.getElementById('highlightInput').focus();}catch(e){}
</script>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
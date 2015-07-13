<?php
ob_start(); /* template body */ ?><!--[if IE]>
<style type=”text/css”>
div.infopage a:hover {
-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
filter:alpha(opacity=50);
}
</style>
<![endif]-->
<div id="overview" class="infopage"></div>

<script type="text/javascript">
oGeneralProperties = <?php echo $this->scope["generalProperties"];?>;
oWorkerProperties = <?php echo $this->scope["workerProperties"];?>;
oUserProperties = <?php echo $this->scope["userProperties"];?>;
oStates = <?php echo $this->scope["stateProperties"];?>;
g_map_names = <?php echo $this->scope["map_names"];?>;
oLocales = <?php echo $this->scope["locales"];?>;
oFileAges = <?php echo $this->scope["fileAges"];?>;

// Kick of the worker
addDOMLoadEvent(function(){runWorker(0, 'overview');});

// This disables the context menu when someone clicked anywhere on the map
document.onmousedown = contextMouseDown;
window.onresize = function() { scaleView(); }
window.onscroll = function() { scaleView(); };
</script>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
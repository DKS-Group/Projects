<?php
if (!function_exists('Dwoo_Plugin_headMaps_553e2be60a3e9')) {
function Dwoo_Plugin_headMaps_553e2be60a3e9(Dwoo $dwoo, $maps, $pathBase, $currentMap, $indent = 1) {
static $_callCnt = 0;
$dwoo->scope[' 553e2be60a3e9'.$_callCnt] = array();
$_scope = $dwoo->setScope(array(' 553e2be60a3e9'.($_callCnt++)));
$dwoo->scope['maps'] = $maps;
$dwoo->scope['pathBase'] = $pathBase;
$dwoo->scope['currentMap'] = $currentMap;
$dwoo->scope['indent'] = $indent;
/* -- template start output */?>
        <?php 
$_fh0_data = (isset($dwoo->scope["maps"]) ? $dwoo->scope["maps"] : null);
if ($dwoo->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $dwoo->scope['map'])
	{
/* -- foreach start output */
?><li class="lvl<?php echo $dwoo->scope["indent"];
if ((isset($dwoo->scope["currentMap"]) ? $dwoo->scope["currentMap"] : null) == (isset($dwoo->scope["map"]["mapName"]) ? $dwoo->scope["map"]["mapName"]:null)) {
?> current<?php 
}?>"><?php if ((isset($dwoo->scope["map"]["configError"]) ? $dwoo->scope["map"]["configError"]:null) == true) {
?><a class="error" href="#"><?php echo $dwoo->scope["map"]["mapAlias"];?></a>
            <?php 
}
else {
?><a href="<?php echo $dwoo->scope["pathBase"];?>/frontend/nagvis-js/index.php?mod=Map&amp;act=view&amp;show=<?php echo $dwoo->scope["map"]["mapName"];?>"><?php echo $dwoo->scope["map"]["mapAlias"];?></a> <?php 
}?></li>
            <?php if ((isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null)) {

echo Dwoo_Plugin_headMaps_553e2be60a3e9($dwoo, (isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null), (isset($dwoo->scope["pathBase"]) ? $dwoo->scope["pathBase"] : null), (isset($dwoo->scope["currentMap"]) ? $dwoo->scope["currentMap"] : null), ((isset($dwoo->scope["indent"]) ? $dwoo->scope["indent"] : null) + 1));

}

/* -- foreach end output */
	}
}?>

        <?php /* -- template end output */ $dwoo->setScope($_scope, true);
}
}
if (!function_exists('Dwoo_Plugin_sideMaps_553e2be618827')) {
function Dwoo_Plugin_sideMaps_553e2be618827(Dwoo $dwoo, $maps, $pathBase, $showStates, $currentMap, $indent = 1) {
static $_callCnt = 0;
$dwoo->scope[' 553e2be618827'.$_callCnt] = array();
$_scope = $dwoo->setScope(array(' 553e2be618827'.($_callCnt++)));
$dwoo->scope['maps'] = $maps;
$dwoo->scope['pathBase'] = $pathBase;
$dwoo->scope['showStates'] = $showStates;
$dwoo->scope['currentMap'] = $currentMap;
$dwoo->scope['indent'] = $indent;
/* -- template start output */?>
<?php 
$_fh2_data = (isset($dwoo->scope["maps"]) ? $dwoo->scope["maps"] : null);
if ($dwoo->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $dwoo->scope['map'])
	{
/* -- foreach start output */
?><li class="lvl<?php echo $dwoo->scope["indent"];
if ((isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null)) {
?> closed parent<?php 
}
if ((isset($dwoo->scope["currentMap"]) ? $dwoo->scope["currentMap"] : null) == (isset($dwoo->scope["map"]["mapName"]) ? $dwoo->scope["map"]["mapName"]:null)) {
?> current<?php 
}?>"><div>
<?php if ((isset($dwoo->scope["showStates"]) ? $dwoo->scope["showStates"] : null)) {
?><div class="statediv" id="side-state-<?php echo $dwoo->scope["map"]["mapName"];?>"></div><?php 
}?>

<?php if ((isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null)) {
?><a class=open href="<?php echo $dwoo->scope["pathBase"];?>/frontend/nagvis-js/index.php?mod=Map&amp;act=view&amp;show=<?php echo $dwoo->scope["map"]["mapName"];?>">&gt;</a><?php 
}?>

<a class="<?php if ((isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null)) {
?>title<?php 
}?> <?php echo $dwoo->scope["map"]["class"];?> <?php if ((isset($dwoo->scope["map"]["configError"]) ? $dwoo->scope["map"]["configError"]:null)) {
?>error<?php 
}?>" <?php if ((isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null)) {
?>onclick="sidebarToggleSubtree(this);return false" id="sb-<?php echo $dwoo->scope["map"]["mapName"];?>"<?php 
}?>

<?php if ((isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null)) {
?>href="#"<?php 
}
else {
?>href="<?php echo $dwoo->scope["pathBase"];?>/frontend/nagvis-js/index.php?mod=Map&amp;act=view&amp;show=<?php echo $dwoo->scope["map"]["mapName"];?>"<?php 
}?>><?php echo $dwoo->scope["map"]["mapAlias"];?></a>
</div><?php if ((isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null)) {
?><ul id="sb-<?php echo $dwoo->scope["map"]["mapName"];?>-childs" style="display:none;"><?php echo Dwoo_Plugin_sideMaps_553e2be618827($dwoo, (isset($dwoo->scope["map"]["childs"]) ? $dwoo->scope["map"]["childs"]:null), (isset($dwoo->scope["pathBase"]) ? $dwoo->scope["pathBase"] : null), (isset($dwoo->scope["showStates"]) ? $dwoo->scope["showStates"] : null), (isset($dwoo->scope["currentMap"]) ? $dwoo->scope["currentMap"] : null), ((isset($dwoo->scope["indent"]) ? $dwoo->scope["indent"] : null) + 1));?></ul><?php 
}?></li><?php 
/* -- foreach end output */
	}
}?>

<?php /* -- template end output */ $dwoo->setScope($_scope, true);
}
}
ob_start(); /* template body */ ?><script type="text/javascript" src="<?php echo $this->scope["pathHeaderJs"];?>"></script>
<?php if ((isset($this->scope["showStates"]) ? $this->scope["showStates"] : null)) {
?><script type="text/javascript">var g_map_names = <?php echo $this->scope["mapNames"];?>;</script><?php 
}?>


<div id="headershow" class="header"><a href="#" onclick="headerToggle(true)"><img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_show.png" alt="Show header menu" /></a></div>
<div id="header" class="header">
<ul class="head">
  <li><a href="#" onclick="headerToggle(true)"><img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_hide.png" alt="Hide header menu" /></a></li>
    <li class="logo"><a href="http://www.nagvis.org/"><img src="<?php echo $this->scope["pathImages"];?>/internal/logo_96x25.png" alt="NagVis" /></a></li>
    <li onmouseover="!sidebarOpen() ? showMapDropdown() : void(0)" class="dropdown">
        <span id="views-ddheader" onclick="toggleSidebar(true)"><?php echo $this->scope["langOpen"];?> <img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_down.png" alt="&#8711;" /></span>
        
        <ul id="views-ddcontent">
            <?php if ((isset($this->scope["permittedOverview"]) ? $this->scope["permittedOverview"] : null)) {
?>
              <li><a href="<?php echo $this->scope["pathBase"];?>/frontend/nagvis-js/index.php"><?php echo $this->scope["langOverview"];?></a></li>
            <?php 
}?>

            <?php if (count((isset($this->scope["maps"]) ? $this->scope["maps"] : null)) > 0) {
?>
              <li class="spacer"><hr /></li>
              <?php echo Dwoo_Plugin_headMaps_553e2be60a3e9($this, (isset($this->scope["maps"]) ? $this->scope["maps"] : null), (isset($this->scope["pathBase"]) ? $this->scope["pathBase"] : null), (isset($this->scope["currentMap"]) ? $this->scope["currentMap"] : null), 1);?>

            <?php 
}?>

            <li class="spacer underline"></li>
        </ul>
    </li>
    <?php if (( (isset($this->scope["mod"]) ? $this->scope["mod"] : null) == 'Map' && ( ( (isset($this->scope["permittedEdit"]) ? $this->scope["permittedEdit"] : null) == true && (isset($this->scope["act"]) ? $this->scope["act"] : null) != 'edit' ) || ( (isset($this->scope["permittedView"]) ? $this->scope["permittedView"] : null) == true && (isset($this->scope["act"]) ? $this->scope["act"] : null) != 'view' ) || (isset($this->scope["permittedSearch"]) ? $this->scope["permittedSearch"] : null) ) ) || (isset($this->scope["bRotation"]) ? $this->scope["bRotation"] : null) == true) {
?>
    <li onmouseover="ddMenu('action')" class="dropdown">
        <span id="action-ddheader"><?php echo $this->scope["langActions"];?> <img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_down.png" alt="&#8711;" /></span>
        <ul id="action-ddcontent">
            <?php if ((isset($this->scope["mod"]) ? $this->scope["mod"] : null) == 'Map' && (isset($this->scope["permittedSearch"]) ? $this->scope["permittedSearch"] : null)) {
?>
            <li><a href="javascript:void(0)" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=Search&amp;act=view', '<?php echo $this->scope["langSearch"];?>')"><?php echo $this->scope["langSearch"];?></a></li>
            <?php 
}?>

            <?php if ((isset($this->scope["mod"]) ? $this->scope["mod"] : null) == 'Map' && (isset($this->scope["permittedEdit"]) ? $this->scope["permittedEdit"] : null) == true) {
?>
            <li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=Map&amp;act=addModify&amp;show=<?php echo $this->scope["currentMap"];?>&amp;object_id=0&mode=view_params'+getViewParams(null, true), '<?php echo $this->scope["langModifyParams"];?>');"><?php echo $this->scope["langModifyParams"];?></a></li>
            <?php 
}?>

            <?php if ((isset($this->scope["bRotation"]) ? $this->scope["bRotation"] : null) == true) {
?>
            <li id="rotationStart" style="display:none"><a href="#" onclick="switchRotation()"><?php echo $this->scope["langRotationStart"];?></a></li>
            <li id="rotationStop" style="display:inline"><a href="#" onclick="switchRotation()"><?php echo $this->scope["langRotationStop"];?></a></li>
            <?php 
}?>

            <?php if ((isset($this->scope["mod"]) ? $this->scope["mod"] : null) == 'Map' && (isset($this->scope["usesSources"]) ? $this->scope["usesSources"] : null) && (isset($this->scope["permittedEdit"]) ? $this->scope["permittedEdit"] : null) == true) {
?>
            <li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=Map&amp;act=toStaticMap&amp;show=dialog', '<?php echo $this->scope["langToStaticMap"];?>')"><?php echo $this->scope["langToStaticMap"];?></a></li>
            <?php 
}?>

            <li class="spacer underline"></li>
        </ul>
    </li>
    <?php 
}?>

    <?php if ((isset($this->scope["mod"]) ? $this->scope["mod"] : null) == 'Map' && (isset($this->scope["currentMap"]) ? $this->scope["currentMap"] : null) != '' && (isset($this->scope["permittedEdit"]) ? $this->scope["permittedEdit"] : null) == true) {
?>
    <li onmouseover="ddMenu('map')" class="dropdown">
        <span id="map-ddheader"><?php echo $this->scope["langMapEdit"];?> <img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_down.png" alt="&#8711;" /></span>
        <ul id="map-ddcontent">
            <?php if ((isset($this->scope["canMoveObjects"]) ? $this->scope["canMoveObjects"] : null) || (isset($this->scope["canAddObjects"]) ? $this->scope["canAddObjects"] : null) || (isset($this->scope["canEditObjects"]) ? $this->scope["canEditObjects"] : null)) {
?>
            <li><a href="#" onclick="toggleAllMapObjectsLock();ddMenuHide()"><?php echo $this->scope["langLockUnlockAll"];?></a></li>
            <li class="spacer"><hr /></li>
            <?php 
}?>

            <?php if ((isset($this->scope["canMoveObjects"]) ? $this->scope["canMoveObjects"] : null)) {
?>
            <li><a href="#" onclick="gridToggle();ddMenuHide()"><?php echo $this->scope["langToggleGrid"];?></a></li>
            <li class="spacer"><hr /></li>
            <?php 
}?>

            <?php if ((isset($this->scope["canAddObjects"]) ? $this->scope["canAddObjects"] : null)) {
?>
            <li onmouseover="ddMenu('map-addicon', true)" class="dropdown subdropdown">
                <a class="submenu-link" id="map-addicon-ddheader" href="#"><?php echo $this->scope["langMapAddIcon"];?></a>
                <ul id="map-addicon-ddcontent">
                	<li><a class="topline" href="#" onclick="addObject(event, 'host', 'icon', 1, 'add');ddMenuHide();"><?php echo $this->scope["langHost"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'service', 'icon', 1, 'add');ddMenuHide();"><?php echo $this->scope["langService"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'hostgroup', 'icon', 1, 'add');ddMenuHide();"><?php echo $this->scope["langHostgroup"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'servicegroup', 'icon', 1, 'add');ddMenuHide();"><?php echo $this->scope["langServicegroup"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'dyngroup', 'icon', 1, 'add');ddMenuHide();"><?php echo $this->scope["langDynGroup"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'aggr', 'icon', 1, 'add');ddMenuHide();"><?php echo $this->scope["langAggr"];?></a></li>
                	<li><a class="underline" href="#" onclick="addObject(event, 'map', 'icon', 1, 'add');ddMenuHide();"><?php echo $this->scope["langMap"];?></a></li>
                </ul>
            </li>
            <li onmouseover="ddMenu('map-addline', true)" class="dropdown subdropdown">
                <a class="submenu-link" id="map-addline-ddheader" href="#"><?php echo $this->scope["langMapAddLine"];?></a>
                <ul id="map-addline-ddcontent">
                	<li><a class="topline" href="#" onclick="addObject(event, 'host', 'line', 2, 'add');ddMenuHide();"><?php echo $this->scope["langHost"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'service', 'line', 2, 'add');ddMenuHide();"><?php echo $this->scope["langService"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'hostgroup', 'line', 2, 'add');ddMenuHide();"><?php echo $this->scope["langHostgroup"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'servicegroup', 'line', 2, 'add');ddMenuHide();"><?php echo $this->scope["langServicegroup"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'dyngroup', 'line', 2, 'add');ddMenuHide();"><?php echo $this->scope["langDynGroup"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'aggr', 'line', 2, 'add');ddMenuHide();"><?php echo $this->scope["langAggr"];?></a></li>
                	<li><a class="underline" href="#" onclick="addObject(event, 'map', 'line', 2, 'add');ddMenuHide();"><?php echo $this->scope["langMap"];?></a></li>
                </ul>
            </li>
            <li onmouseover="ddMenu('map-addspecial', true)" class="dropdown subdropdown">
                <a class="submenu-link" id="map-addspecial-ddheader" href="#"><?php echo $this->scope["langMapAddSpecial"];?></a>
                <ul id="map-addspecial-ddcontent">
                	<li><a class="topline" href="#" onclick="addObject(event, 'shape', '', 1, 'add');ddMenuHide();"><?php echo $this->scope["langShape"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'textbox', '', 2, 'add');ddMenuHide();"><?php echo $this->scope["langTextbox"];?></a></li>
                	<li><a class="" href="#" onclick="addObject(event, 'line', 'line', 2, 'add');ddMenuHide();"><?php echo $this->scope["langStateless"];?> <?php echo $this->scope["langLine"];?></a></li>
                	<li><a class="underline" href="javascript:void(0)" onclick="addObject(event, 'container', '', 2, 'add');ddMenuHide();"><?php echo $this->scope["langContainer"];?></a></li>
                </ul>
            </li>
            <li class="spacer"><hr /></li>
            <li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=Map&amp;act=manageTmpl&amp;show=<?php echo $this->scope["currentMap"];?>', '<?php echo $this->scope["langMapManageTmpl"];?>', 300);ddMenuHide();"><?php echo $this->scope["langMapManageTmpl"];?></a></li>
            <?php 
}?>

            <li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=Map&amp;act=addModify&amp;show=<?php echo $this->scope["currentMap"];?>&amp;object_id=0', '<?php echo $this->scope["langMapOptions"];?>');ddMenuHide();" class="underline"><?php echo $this->scope["langMapOptions"];?></a></li>
        </ul>
    </li>
    <?php 
}?>

    <?php if ((isset($this->scope["permittedEditMainCfg"]) ? $this->scope["permittedEditMainCfg"] : null) || (isset($this->scope["permittedManageBackgrounds"]) ? $this->scope["permittedManageBackgrounds"] : null) || (isset($this->scope["permittedManageMaps"]) ? $this->scope["permittedManageMaps"] : null) || (isset($this->scope["permittedManageShapes"]) ? $this->scope["permittedManageShapes"] : null)) {
?>
    <li onmouseover="ddMenu('wui')" class="dropdown">
        <span id="wui-ddheader"><?php echo $this->scope["langOptions"];?> <img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_down.png" alt="&#8711;" /></span>
        <ul id="wui-ddcontent">
            <?php if ((isset($this->scope["permittedEditMainCfg"]) ? $this->scope["permittedEditMainCfg"] : null)) {
?><li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=MainCfg&amp;act=edit', '<?php echo $this->scope["langEditMainCfg"];?>', 550);ddMenuHide();"><?php echo $this->scope["langEditMainCfg"];?></a></li>
            <li class="spacer"><hr /></li>
            <li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=MainCfg&amp;act=manageBackends', '<?php echo $this->scope["langMgmtBackends"];?>');ddMenuHide();"><?php echo $this->scope["langMgmtBackends"];?></a></li><?php 
}?>

            <?php if ((isset($this->scope["permittedManageBackgrounds"]) ? $this->scope["permittedManageBackgrounds"] : null)) {
?><li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=ManageBackgrounds&amp;act=view', '<?php echo $this->scope["langMgmtBackgrounds"];?>');ddMenuHide();"><?php echo $this->scope["langMgmtBackgrounds"];?></a></li><?php 
}?>

            <?php if ((isset($this->scope["permittedManageMaps"]) ? $this->scope["permittedManageMaps"] : null)) {
?><li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=Map&amp;act=manage', '<?php echo $this->scope["langMgmtMaps"];?>');ddMenuHide();"><?php echo $this->scope["langMgmtMaps"];?></a></li><?php 
}?>

            <?php if ((isset($this->scope["permittedManageShapes"]) ? $this->scope["permittedManageShapes"] : null)) {
?><li><a class="underline" href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=ManageShapes&amp;act=view', '<?php echo $this->scope["langMgmtShapes"];?>');ddMenuHide();"><?php echo $this->scope["langMgmtShapes"];?></a></li><?php 
}?>

        </ul>
    </li>
    <?php 
}?>

</ul>
<ul class="head right">
    <li><div id="refreshCounterHead"></div></li>
    <li id="editIndicator" style="display:none">
        <span>Edit Mode!</span>
    </li>
    <li onmouseover="ddMenu('user')" class="dropdown">
        <span id="user-ddheader"><?php echo $this->scope["langUser"];?><img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_down.png" alt="&#8711;" /></span>
        <ul id="user-ddcontent">
        	<li><a href="#"><?php echo $this->scope["langLoggedIn"];?>: <?php echo $this->scope["currentUser"];?></a></li>
        	<?php if ((isset($this->scope["supportedChangePassword"]) ? $this->scope["supportedChangePassword"] : null) && (isset($this->scope["permittedChangePassword"]) ? $this->scope["permittedChangePassword"] : null)) {
?><li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=ChangePassword&amp;act=view', '<?php echo $this->scope["langChangePassword"];?>');ddMenuHide();"><?php echo $this->scope["langChangePassword"];?></a></li><?php 
}?>

        	<?php if ((isset($this->scope["permittedUserMgmt"]) ? $this->scope["permittedUserMgmt"] : null)) {
?><li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=UserMgmt&amp;act=view', '<?php echo $this->scope["langUserMgmt"];?>');ddMenuHide();"><?php echo $this->scope["langUserMgmt"];?></a></li><?php 
}?>

        	<?php if ((isset($this->scope["rolesConfigurable"]) ? $this->scope["rolesConfigurable"] : null) && (isset($this->scope["permittedRoleMgmt"]) ? $this->scope["permittedRoleMgmt"] : null)) {
?><li><a href="#" onclick="showFrontendDialog(oGeneralProperties.path_server+'?mod=RoleMgmt&amp;act=view', '<?php echo $this->scope["langManageRoles"];?>', 500);ddMenuHide();"><?php echo $this->scope["langManageRoles"];?></a></li><?php 
}?>

            <?php if ((isset($this->scope["permittedLogout"]) ? $this->scope["permittedLogout"] : null)) {
?><li><a href="#" onclick="getSyncRequest('<?php echo $this->scope["pathBase"];?>/server/core/ajax_handler.php?mod=Auth&amp;act=logout');ddMenuHide();return false;"><?php echo $this->scope["langLogout"];?></a></li><?php 
}?>

            <li class="spacer underline"></li>
        </ul>
    </li>
    <li onmouseover="ddMenu('language')" class="dropdown">
        <span id="language-ddheader"><?php echo $this->scope["langChooseLanguage"];?> <img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_down.png" alt="&#8711;" /></span>
        <ul id="language-ddcontent">
            <?php 
$_fh1_data = (isset($this->scope["langs"]) ? $this->scope["langs"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['lang'])
	{
/* -- foreach start output */
?><li><a href="<?php echo str_replace('&', '&amp;', (isset($this->scope["currentUri"]) ? $this->scope["currentUri"] : null));
if (strpos((isset($this->scope["currentUri"]) ? $this->scope["currentUri"] : null), '?') !== false) {
?>&amp;<?php 
}
else {
?>?<?php 
}?>lang=<?php echo $this->scope["lang"]["language"];?>"><?php echo $this->scope["lang"]["langLanguageLocated"];?></a></li><?php 
/* -- foreach end output */
	}
}?>

          	<li class="spacer underline"></li>
        </ul>
    </li>
    <li onmouseover="ddMenu('support')" class="dropdown">
        <span id="support-ddheader"><?php echo $this->scope["langNeedHelp"];?> <img src="<?php echo $this->scope["pathTemplateImages"];?>default.header_down.png" alt="&#8711;" /></span>
        <ul id="support-ddcontent">
            <li><a href="<?php echo $this->scope["pathBase"];?>/docs/<?php echo $this->scope["docLanguage"];?>/index.html"><?php echo $this->scope["langOnlineDoc"];?></a></li>
            <li><a href="http://www.monitoring-portal.org/wbb/index.php?page=Board&amp;boardID=42"><?php echo $this->scope["langForum"];?></a></li>
            <li><a href="<?php echo $this->scope["pathBase"];?>/frontend/nagvis-js/index.php?mod=Info" class="underline"><?php echo $this->scope["langSupportInfo"];?></a></li>
        </ul>
    </li>
    <li style="width:120px"></li>
</ul>
</div>


<div id="sidebar">
<ul>
    <?php if ((isset($this->scope["permittedOverview"]) ? $this->scope["permittedOverview"] : null)) {
?><li class="spacerbottom"><div><a href="<?php echo $this->scope["pathBase"];?>/frontend/nagvis-js/index.php"><?php echo $this->scope["langOverview"];?></a></div></li><?php 
}?>

    <li class="closed"><div><a id="sb-maps" class="title" href="#" onclick="sidebarToggleSubtree(this);return false;"><?php echo $this->scope["langMaps"];?></a></div>
        <ul id="sb-maps-childs" style="display:none;"><?php echo Dwoo_Plugin_sideMaps_553e2be618827($this, (isset($this->scope["maps"]) ? $this->scope["maps"] : null), (isset($this->scope["pathBase"]) ? $this->scope["pathBase"] : null), (isset($this->scope["showStates"]) ? $this->scope["showStates"] : null), (isset($this->scope["currentMap"]) ? $this->scope["currentMap"] : null), 1);?></ul>
    </li>
    <?php if (count((isset($this->scope["rotations"]) ? $this->scope["rotations"] : null)) > 0) {
?>
    <li class="closed spacertop"><div><a id="sb-rotations" class="title" href="#" onclick="sidebarToggleSubtree(this);return false"><?php echo $this->scope["langRotations"];?></a></div>
        <ul id="sb-rotations-childs" style="display:none;">
        <?php 
$_fh3_data = (isset($this->scope["rotations"]) ? $this->scope["rotations"] : null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['rotation'])
	{
/* -- foreach start output */
?>
            <li class=lvl1><div><a href="<?php echo $this->scope["pathBase"];?>/frontend/nagvis-js/index.php?mod=Rotation&act=view&show=<?php echo $this->scope["rotation"];?>"><?php echo $this->scope["rotation"];?></a></div></li>
        <?php 
/* -- foreach end output */
	}
}?>

        </ul>
    </li>
    <?php 
}?>

</ul>
</div>
<div id="headerspacer"></div>
<script type="text/javascript">addDOMLoadEvent(function(){sidebarDraw(); headerDraw();});</script>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
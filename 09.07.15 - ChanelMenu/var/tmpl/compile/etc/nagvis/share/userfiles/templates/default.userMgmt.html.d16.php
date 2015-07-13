<?php
ob_start(); /* template body */ ?><input type="hidden" /><!-- The template must not start with a script tag. This would be ignored by IE //-->
<script type="text/javascript">
selectAllOpts = function (field) {
    var oTarget = document.getElementById(field);

    for(var i = 0; i < oTarget.options.length; i++) {
        oTarget.options[i].selected = true;
    }

    var oTarget = null;
}

roleModify = function (bAdd) {
    var oTarget = null;
    var oSource = null;

    if(bAdd) {
        oSource = document.getElementById('rolesAvailable');
        oTarget = document.getElementById('rolesSelected');
    } else {
        oSource = document.getElementById('rolesSelected');
        oTarget = document.getElementById('rolesAvailable');
    }

    // Quit when no source selected
    if(oSource.selectedIndex == -1) {
        return false;
    }

    // Save strings
    var optName = oSource.options[oSource.selectedIndex].text;
    var optValue = oSource.options[oSource.selectedIndex].value;

    // Remove from source
    oSource.options[oSource.selectedIndex] = null;

    // Add to target
    oTarget.options[oTarget.options.length] = new Option(optName, optValue, false, false);

    oRolesSelected = null;
    oRolesAvailable = null;
}

getUserRoles = function (id) {
    // Exit when id empty
    if(id == '') {
        return false;
    }

    // Get user roles via ajax query
    var aRoles = getSyncRequest(oGeneralProperties.path_server+'?mod=UserMgmt&act=getUserRoles&userId='+id, false, false);
    var aAvailableRoles = getSyncRequest(oGeneralProperties.path_server+'?mod=UserMgmt&act=getAllRoles', false, false);

    var oRolesAvailable = document.getElementById('rolesAvailable');
    var oRolesSelected = document.getElementById('rolesSelected');

    // Clear available roles
    for(var i = oRolesAvailable.options.length - 1; i >= 0; i--) {
        oRolesAvailable.options[i] = null;
    }

    // Add all roles to selected roles
    for(i = 0; i < aAvailableRoles.length; i++) {
        oRolesAvailable.options[i] = new Option(aAvailableRoles[i].name, aAvailableRoles[i].roleId, false, false);
    }

    // Clear selected roles
    for(var i = oRolesSelected.options.length - 1; i >= 0; i--) {
        oRolesSelected.options[i] = null;
    }

    // Add user roles to selected roles
    for(i = 0; i < aRoles.length; i++) {
        oRolesSelected.options[i] = new Option(aRoles[i].name, aRoles[i].roleId, false, false);
    }

    // Remove selected roles from available roles
    for(i = oRolesAvailable.options.length - 1; i >= 0; i--) {

        // Loop all selected roles
        for(var a = 0; a < aRoles.length; a++) {
            if(oRolesAvailable.options[i].text == aRoles[a].name) {
                oRolesAvailable.options[i] = null;
            }
        }
    }

    oRolesSelected = null;
    oRolesAvailable = null;
    aRoles = null;
}
</script>

<div id="userAdd">
    <h2><?php echo $this->scope["langUserAdd"];?></h2>
    <form name="userAdd" id="userAddForm" action="#" onsubmit="submitFrontendForm('<?php echo $this->scope["formTargetAdd"];?>', 'userAddForm', true);return false" method="post">
        <table class="mytable">
            <tr>
                <td class="tdlabel"><?php echo $this->scope["langUsername"];?></td>
                <td class="tdfield"><input type="text" name="username" id="username" class="input" value="" size="<?php echo $this->scope["maxUsernameLength"];?>" tabindex="10" required /></td>
            </tr>
            <tr>
                <td class="tdlabel"><?php echo $this->scope["langPassword1"];?></td>
                <td class="tdfield"><input type="password" name="password1" id="password1" class="input" value="" size="<?php echo $this->scope["maxPasswordLength"];?>" tabindex="20" required /></td>
            </tr>
            <tr>
                <td class="tdlabel"><?php echo $this->scope["langPassword2"];?></td>
                <td class="tdfield"><input type="password" name="password2" id="password2" class="input" value="" size="<?php echo $this->scope["maxPasswordLength"];?>" tabindex="30" required /></td>
            </tr>
            <tr>
                <td colspan="2"><input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langUserAdd"];?>" tabindex="40" /></td>
            </tr>
        </table>
    </form>
</div>

<?php if ((isset($this->scope["rolesConfigurable"]) ? $this->scope["rolesConfigurable"] : null)) {
?><div id="manageUsers">
    <h2><?php echo $this->scope["langUserModify"];?></h2>
    <form name="userEdit" id="userEditForm" action="#" onsubmit="selectAllOpts('rolesSelected');submitFrontendForm('<?php echo $this->scope["formTargetEdit"];?>', 'userEditForm', true);return false" method="post">
    <table class="mytable">
        <tr>
            <td class="tdlabel"><?php echo $this->scope["langSelectUser"];?></td>
            <td class="tdfield" colspan="2">
                <select type="text" name="userId" id="userId" tabindex="50" onchange="getUserRoles(this.options[this.selectedIndex].value);" required />
                    <option value="" selected="selected"></option>
                    <?php 
$_fh0_data = (isset($this->scope["users"]) ? $this->scope["users"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['user'])
	{
/* -- foreach start output */
?><option value="<?php echo $this->scope["user"]["userId"];?>"><?php echo $this->scope["user"]["name"];?></option><?php 
/* -- foreach end output */
	}
}?>

                </select>
            </td>
        </tr>
        <tr>
            <td><?php echo $this->scope["langRolesAvailable"];?></td>
            <td style="width:30px"></td>
            <td><?php echo $this->scope["langRolesSelected"];?></td>
        </tr>
        <tr>
            <td>
                <select style="width:100%" name="rolesAvailable" id="rolesAvailable" tabindex="60" size="5" multiple />
                </select>
            </td>
            <td style="vertical-align:middle">
            <input type="button" name="add" onclick="roleModify(true)" value="&gt;" tabindex="70" /><br />
            <input type="button" name="remove" onclick="roleModify()" value="&lt;" tabindex="80" /></a>
            </td>
            <td>
                <select style="width:100%" name="rolesSelected" id="rolesSelected" tabindex="90" size="5" multiple />
                </select>
            </td>
        </tr>
    </table>
    <input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langUserModify"];?>" tabindex="100" />
    </form>
</div><?php 
}?>


<div id="deleteUsers">
    <h2><?php echo $this->scope["langUserDelete"];?></h2>
    <form name="userDelete" id="userDeleteForm" action="#" onsubmit="submitFrontendForm('<?php echo $this->scope["formTargetDelete"];?>', 'userDeleteForm', true);return false" method="post">
        <table class="mytable">
            <tr>
                <td class="tdlabel"><?php echo $this->scope["langUsername"];?></td>
                <td class="tdfield">
                    <select type="text" name="userId" id="userId" tabindex="110" required />
                        <option value="" selected="selected"></option>
                        <?php 
$_fh1_data = (isset($this->scope["users"]) ? $this->scope["users"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['user'])
	{
/* -- foreach start output */
?><option value="<?php echo $this->scope["user"]["userId"];?>"><?php echo $this->scope["user"]["name"];?></option><?php 
/* -- foreach end output */
	}
}?>

                    </select>
                </td>
                <td><input type="submit" name="submit" value="<?php echo $this->scope["langUserDelete"];?>" tabindex="120" /></td>
            </tr>
        </table>
    </form>
</div>

<?php if ((isset($this->scope["supportedChangePassword"]) ? $this->scope["supportedChangePassword"] : null)) {
?><div id="userPwReset">
    <h2><?php echo $this->scope["langUserPwReset"];?></h2>
    <form name="userPwReset" id="userPwResetForm" action="#" onsubmit="submitFrontendForm('<?php echo $this->scope["formTargetPwReset"];?>', 'userPwResetForm', true);return false" method="post">
        <table class="mytable">
            <tr>
                <td class="tdlabel"><?php echo $this->scope["langSelectUser"];?></td>
                <td class="tdfield">
                <select type="text" name="userId" id="userId" tabindex="130" required />
                    <option value="" selected="selected"></option>
                    <?php 
$_fh2_data = (isset($this->scope["users"]) ? $this->scope["users"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['user'])
	{
/* -- foreach start output */
?><option value="<?php echo $this->scope["user"]["userId"];?>"><?php echo $this->scope["user"]["name"];?></option><?php 
/* -- foreach end output */
	}
}?>

                </select>
                </td>
            </tr>
            <tr>
                <td class="tdlabel"><?php echo $this->scope["langPassword1"];?></td>
                <td class="tdfield"><input type="password" name="password1" id="password1" class="input" value="" size="<?php echo $this->scope["maxPasswordLength"];?>" tabindex="140" /></td>
            </tr>
            <tr>
                <td class="tdlabel"><?php echo $this->scope["langPassword2"];?></td>
                <td class="tdfield"><input type="password" name="password2" id="password2" class="input" value="" size="<?php echo $this->scope["maxPasswordLength"];?>" tabindex="150" /></td>
            </tr>
            <tr>
                <td colspan="2"><input class="submit" type="submit" name="submit" value="<?php echo $this->scope["langUserPwReset"];?>" tabindex="160" /></td>
            </tr>
        </table>
    </form>
<?php 
}?>

</div>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
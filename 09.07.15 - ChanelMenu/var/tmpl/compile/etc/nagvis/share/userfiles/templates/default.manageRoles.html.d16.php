<?php
ob_start(); /* template body */ ?><input type="hidden" /><!-- The template must not start with a script tag. This would be ignored by IE //-->
<script type="text/javascript">
selectRolePerms = function (id) {
    // Exit when id empty
    if(id == '') {
        return false;
    }

    // Get perms of role via ajax query
    var aRoles = getSyncRequest(oGeneralProperties.path_server+'?mod=RoleMgmt&act=getRolePerms&roleId='+id, false, false);

    var oForm = document.getElementById('roleEditForm');

    // Get relevant input elements
    var aFields = oForm.getElementsByTagName('input');
    for(var i = 0, len = aFields.length; i < len; i++) {
        if(aFields[i].type == "checkbox") {
            // First reset all checkboxes
            if(aFields[i].checked) {
                aFields[i].checked = false;
            }

            // Extract permission id from name
            var id = aFields[i].name.split('_')[1];

            // Enable checkboxes of matched permissions
            if(aRoles && aRoles[id] && aRoles[id] == true) {
                aFields[i].checked = true;
            }
        }
    }

    aFields = null;
    oForm = null;
    aRoles = null;
}
</script>

<div id="manageRoles">
<h2><?php echo $this->scope["langRoleAdd"];?></h2>
<form name="roleAdd" id="roleAddForm" action="#" onsubmit="submitFrontendForm('<?php echo $this->scope["formTargetAdd"];?>', 'roleAddForm', true);return false" method="post">
    <table>
        <tr>
            <td><label for="name"><?php echo $this->scope["langRoleName"];?>:</label></td>
            <td><input type="text" name="name" id="name" class="input" value="" size="<?php echo $this->scope["maxRolenameLength"];?>" tabindex="10" required /></td>
            <td><input type="submit" name="submit" id="submit" value="<?php echo $this->scope["langRoleAdd"];?>" tabindex="20" /></td>
        </tr>
    </table>
</form>
</div>

<div id="manageRoles">
    <h2><?php echo $this->scope["langRoleModify"];?></h2>
    <form name="roleEdit" id="roleEditForm" action="#" onsubmit="submitFrontendForm('<?php echo $this->scope["formTargetEdit"];?>', 'roleEditForm', true);return false" method="post">
        <p>
            <label><?php echo $this->scope["langSelectRole"];?><br />
            <select type="text" name="roleId" id="roleId" class="select" tabindex="10" onchange="selectRolePerms(this.options[this.selectedIndex].value);" required />
                <option value="" selected="selected"></option>
                <?php 
$_fh0_data = (isset($this->scope["roles"]) ? $this->scope["roles"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['role'])
	{
/* -- foreach start output */
?><option value="<?php echo $this->scope["role"]["roleId"];?>"><?php echo $this->scope["role"]["name"];?></option><?php 
/* -- foreach end output */
	}
}?>

            </select>
            </label>
        </p>
        <p>
            <label><?php echo $this->scope["langSetPermissions"];?><br />
            <table>
                <tr>
                    <th><?php echo $this->scope["langModule"];?></th>
                    <th><?php echo $this->scope["langAction"];?></th>
                    <th><?php echo $this->scope["langObject"];?></th>
                    <th><?php echo $this->scope["langPermitted"];?></th>
                </tr>
                <?php 
$_fh1_data = (isset($this->scope["perms"]) ? $this->scope["perms"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['perm'])
	{
/* -- foreach start output */
?>
                <tr>
                    <td><?php echo $this->scope["perm"]["mod"];?></td>
                    <td><?php echo $this->scope["perm"]["act"];?></td>
                    <td><?php echo $this->scope["perm"]["obj"];?></td>
                    <td><input type="checkbox" name="perm_<?php echo $this->scope["perm"]["permId"];?>" value="1"></td>
                </tr>
                <?php 
/* -- foreach end output */
	}
}?>

            </table>
            </label>
        </p>
        <input class="submit" type="submit" name="submit" id="submit" value="<?php echo $this->scope["langRoleModify"];?>" tabindex="100" />
    </form>
</div>

<div id="deleteRoles">
    <h2><?php echo $this->scope["langRoleDelete"];?></h2>
    <form name="roleDelete" id="roleDeleteForm" action="#" onsubmit="submitFrontendForm('<?php echo $this->scope["formTargetDelete"];?>', 'roleDeleteForm', true);return false" method="post">
        <table>
            <tr>
                <td><label for="roleId"><?php echo $this->scope["langRoleName"];?>:</label></td>
                <td>
                    <select type="text" name="roleId" id="roleId" class="select" tabindex="40" required />
                        <option value="" selected="selected"></option>
                        <?php 
$_fh2_data = (isset($this->scope["roles"]) ? $this->scope["roles"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['role'])
	{
/* -- foreach start output */
?><option value="<?php echo $this->scope["role"]["roleId"];?>"><?php echo $this->scope["role"]["name"];?></option><?php 
/* -- foreach end output */
	}
}?>

                    </select>
                </td>
                <td><input type="submit" name="submit" id="submit" value="<?php echo $this->scope["langRoleDelete"];?>" tabindex="100" /></td>
            </tr>
        </table>
    </form>
</div>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
<div id="role_list">
    <?php
    echo CHtml::activeDropDownList($user, 'role', CHtml::listData(
                    $user->getUnassignedRoles(), 'name', 'name'), array('class' => 'span4'));
    ?>    
    <input type="button"
           onClick="assign('<?php
    echo Utility::createUrl(
            "users/assignRole", array("id" => $user->id));
    ?>','<?php
           echo Utility::createUrl(
                   "users/reloadRoles", array("id" => $user->id));
    ?>')"
           value="Add" class="assign btn btn-primary"/>
</div>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Permission
 *
 * @author Dawid
 */
class Permission {
    private $sheetId;
    private $userId;
    private $permissionType;
    
    public function __construct($sheetId, $userId, $permissionType) {
        $this->sheetId = $sheetId;
        $this->userId = $userId;
        $this->permissionType= $permissionType;
    }
    public function getSheetId() {
        return $this->sheetId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getPermissionType() {
        return $this->permissionType;
    }


}



?>

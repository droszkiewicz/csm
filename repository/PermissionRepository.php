<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PermissionRepository
 *
 * @author Dawid
 */
class PermissionRepository extends Repository {

    public function addPermission(Permission $perm) {
        $sheetId = $perm->getSheetId();
        $userId = $perm->getUserId();
        $permissionType = $perm->getPermissionType();

        $query = "INSERT INTO `permissions` (
            `user_id`,
            `sheet_id`,
            `permissions`)
            VALUES (
            :userId,
            :sheetId,
            :permissionType
            );";

        $this->db->beginTransaction();
        $handle = $this->db->prepare($query);
        $handle->bindParam(':userId', $userId, Database::PARAM_INT);
        $handle->bindParam(':sheetId', $sheetId, Database::PARAM_INT);
        $handle->bindParam(':permissionType', $permissionType, Database::PARAM_INT);


        $handle->execute();

        $this->db->commit();
    }

    public function removePermission(Permission $perm) { 
            $sheetId = $perm->getSheetId();
            $userId = $perm->getUserId();
            $permissionType = $perm->getPermissionType();

            $query = "DELETE FROM `permissions` WHERE
            `user_id` = :userId AND
            `sheet_id` = :sheetId AND
            `permissions` = :permissionType;
            ";

            $this->db->beginTransaction();
            $handle = $this->db->prepare($query);
            $handle->bindParam(':userId', $userId, Database::PARAM_INT);
            $handle->bindParam(':sheetId', $sheetId, Database::PARAM_INT);
            $handle->bindParam(':permissionType', $permissionType, Database::PARAM_INT);


            $handle->execute();

            $this->db->commit();
        }
    }

?>

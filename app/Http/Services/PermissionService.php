<?php
namespace App\Http\Services;

use Auth;
use App\Permission;

class PermissionService{

    public static function isThisUserHavePermission($permission_name){
      $permissions = Auth::user()->permissions;
      foreach($permissions as $permission){
        if($permission->permission->name == $permission_name){
          return true;
        }
      }
      return false;
    }

    public static function getPermission($permission_name){
      $permission = Permission::where('name',$permission_name)->first();
      if($permission) return $permission;
      return null;
    }

    public static function getAllAvailablePermissions(){
      return Permission::all();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: HoangND
 * Date: 2019/03/13
 * Time: 13:53
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class rolesComponent extends Component
{
    public function checkRole(array $role,$roleid){
        if(count($role)>0){
            foreach ($role as $item){
                if($item['role_details_id']===$roleid){
                   return true;
                }
            }
            return false;
        }else{
            return false;
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Hoàng Nguyễn
 * Date: 10/03/2019
 * Time: 21:45
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;

class RegistrationController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->viewBuilder()->setLayout('loginLayout');
    }

    public function index()
    {

        if ($this->request->isPost()) {
            //get data form login
            $req_user = $this->request->getData();
            //set birthday user
            $strBirthDay = $req_user["birthday"]["year"] . '/' . $req_user["birthday"]["month"] . '/' . $req_user["birthday"]["day"];
            $birthDay = date_format(date_create($strBirthDay), 'Y/m/d');
            //set password md5
            $passwordMd5 = md5($req_user['password']);
            //add user
            $userTable = TableRegistry::getTableLocator()->get('Users');
            $newUser = $userTable->newEntity();
            $newUser->username = $req_user['username'];
            $newUser->password = $passwordMd5;
            $newUser->name = $req_user['name'];
            $newUser->sex = $req_user['sex'];
            $newUser->birthday = $birthDay;
            $newUser->phonenumber = $req_user['phonenumber'];
            $newUser->address = $req_user['address'];
            $userTable->save($newUser);
            //add role
            $roleTable = TableRegistry::getTableLocator()->get('Roles');
            $newRole = $roleTable->newEntity();
            $newRole->role_details_id = 1;
            $newRole->users_id = $userTable->find('all', [
                'conditions' => ['username' => $newUser['username']]
            ])->first()['ID'];
            $roleTable->save($newRole);
        }
    }

}

<?php

/**
 * Created by PhpStorm.
 * User: Hoàng Nguyễn
 * Date: 10/03/2019
 * Time: 21:45
 */

namespace App\Controller\Home;

use App\Controller\Home\HomesController;
use Cake\ORM\TableRegistry;

class RegistrationController extends HomesController {

    public function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadModel('Users');
        $this->loadModel('Roles');
        $this->loadModel('Subaddress');
        $this->loadComponent('validation');
    }

    public function index() {

        if ($this->request->isPost()) {
            //get data form login
            $req_user = $this->request->getData();
            $validation = $this->Users->newEntity($req_user, ['validate' => 'Regestration']);
            $validationError = $validation->errors();
            if (empty($validationError)) {                           
                //set birthday user
                $strBirthDay = $req_user["birthday"]["year"] . '/' . $req_user["birthday"]["month"] . '/' . $req_user["birthday"]["day"];
                $birthDay = date_format(date_create($strBirthDay), 'Y/m/d');
                //set password md5
                $password = $req_user['password'];     
                $passwordMd5 = md5($password);
                //add user
                $newUser = $this->Users->newEntity();
                $newUser->username = $req_user['username'];
                $newUser->password = $passwordMd5;
                $newUser->name = $req_user['name'];
                $newUser->sex = $req_user['sex'];
                $newUser->birthday = $birthDay;
                $newUser->phonenumber = $req_user['phonenumber'];
                $this->Users->save($newUser);

                $userId = $this->Users->find('all', [
                            'conditions' => ['username' => $req_user['username']]
                        ])->first()['id'];
                //add subaddress
                $newSubaddress = $this->Subaddress->newEntity();
                $newSubaddress->address = $req_user['address'];
                $newSubaddress->users_id = $userId;
                $newSubaddress->default_address = 1;
                $this->Subaddress->save($newSubaddress);
                //add role
                $newRole = $this->Roles->newEntity();
                $newRole->role_details_id = 1;
                $newRole->users_id = $userId;
                $this->Roles->save($newRole);
                $this->Flash->success("Regestration user successful");
            } else {
                $this->Flash->error($this->validation->getmessage($validationError));
            }
        }
    }

}

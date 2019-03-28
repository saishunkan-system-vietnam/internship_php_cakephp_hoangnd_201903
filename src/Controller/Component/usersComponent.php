<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class usersComponent extends Component {

    private $Users;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Users = TableRegistry::getTableLocator()->get('Users');
    }

    public function get($id){
        return $this->Users->get($id);
    }
    public function add($req){
        $newUser=  $this->Users->newEntity();
        $newUser->username=$req['username'];
        $newUser->password=$req['password'];
        $newUser->name=$req['name'];
        $newUser->sex=$req['sex'];
        $newUser->birthday=$req['birthday'];
        $newUser->phonenumber=$req['phonenumber'];
        $newUser->address=$req['address'];
        return $this->Users->save($newUser);
    }
     public function update($req){
        $User=  $this->Users->get($req['id']);
        $User->username=$req['username'];
        $User->password=$req['password'];
        $User->name=$req['name'];
        $User->sex=$req['sex'];
        $User->birthday=$req['birthday'];
        $User->phonenumber=$req['phonenumber'];
        $User->address=$req['address'];
        return $this->Users->save($User);
    }
      public function delete($id){
        $User=  $this->Users->get($id);       
        return $this->Users->delete($User);
    }
    
    public function where($req=null){
        $lstUser=  $this->Users->find()->toArray();
        return $lstUser;
    }

}

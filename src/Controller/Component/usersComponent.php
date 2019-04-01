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

    public function get($id) {
        return $this->Users->get($id);
    }

    public function add($req) {

        $username = (isset($req['username'])) ? $req['username'] : '';
        $password = (isset($req['password'])) ? $req['password'] : '';
        $name = (isset($req['name'])) ? $req['name'] : '';
        $sex = (isset($req['sex'])) ? $req['sex'] : 0;
        $birthday = (isset($req['birthday'])) ? $req['birthday'] : '';
        $phonenumber = (isset($req['phonenumber'])) ? $req['phonenumber'] : '';

        $newUser = $this->Users->newEntity();
        $newUser->username = $username;
        $newUser->password = $password;
        $newUser->name = $name;
        $newUser->sex = $sex;
        $newUser->birthday = $birthday;
        $newUser->phonenumber = $phonenumber;        
        return $this->Users->save($newUser);
    }

    public function update($req) {
        $User = $this->Users->get($req['id']);
        $User->username = $req['username'];
        $User->password = $req['password'];
        $User->name = $req['name'];
        $User->sex = $req['sex'];
        $User->birthday = $req['birthday'];
        $User->phonenumber = $req['phonenumber'];
        $User->address = $req['address'];
        return $this->Users->save($User);
    }

    public function delete($id) {
        $User = $this->Users->get($id);
        return $this->Users->delete($User);
    }

    public function where($req = null) {
        $lstUser = $this->Users->find()->toArray();
        return $lstUser;
    }

    public function minmax($condition, $field) {
        $lstUser = $this->Users->find();
        if (strtolower($condition) == 'min') {
            $lstUser = $lstUser->min($field);
        } elseif (strtolower($condition) == 'max') {
            $lstUser = $lstUser->max($field);
        } else {
            return FALSE;
        }
        $user = $lstUser->toArray();
        return $user;
    }

}

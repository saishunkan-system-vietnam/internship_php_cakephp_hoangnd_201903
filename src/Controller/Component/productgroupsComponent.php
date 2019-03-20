<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class productgroupsComponent extends Component {

    private $Groups;
    private $ProductGroups;

    public function initialize(array $config) {
        parent::initialize($config);
        $this->Groups = TableRegistry::getTableLocator()->get('Groups');
    }

    public function getAllGroups() {
        return $this->Groups->find()->toArray();
    }

    public function getGroups($id) {
        return $this->Groups->get($id);
    }

    public function addGroups(array $reqGroup) {
        $newGroup = $this->Groups->newEntity();
        $newGroup->name = $reqGroup['name'];
        return $this->Groups->save($newGroup);
    }

    public function updateGroups(array $reqGroup) {
        $group = $this->Groups->get($reqGroup['id']);
        $group->name = $reqGroup['name'];
        return $this->Groups->save($group);
    }

    public function deleteGroups($id) {
        $group = $this->Groups->get($id);
        return $this->Groups->delete($group);
    }

}

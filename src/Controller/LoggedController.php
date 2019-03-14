<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class LoggedController extends Controller
{
    protected $session;

    protected $chiTietLoaiHangTable;
    protected $loaiHangTable;
    protected $matHangTable;
    protected $nhomHangTable;
    protected $thongSoTable;




    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {

        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

        $this->session = $this->getRequest()->getSession();
        if ($this->session->check('username') === false) {
            $this->redirect('/login');
        }


        $this->loadModel('Chitietloaihang');
        $this->loadModel('Loaihang');
        $this->loadModel('Mathang');
        $this->loaiHangTable = TableRegistry::getTableLocator()->get('Loaihang');
        $this->matHangTable = TableRegistry::getTableLocator()->get('Mathang');
        $this->nhomHangTable = TableRegistry::getTableLocator()->get('Nhomhang');
        $this->thongSoTable = TableRegistry::getTableLocator()->get('Thongso');

    }
}

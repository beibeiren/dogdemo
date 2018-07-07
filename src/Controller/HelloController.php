<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hello Controller
 *
 *
 * @method \App\Model\Entity\Hello[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HelloController extends AppController
{
   // public $name = 'Hello';
   // public $autoRender = flase;

    public function initialize()
    {
       $this->name = 'hello';
       $this->autoRender = false;
       $this->viewBuilder()->enableAutoLayout(false);
    }

    public function index()
    {
        $this->viewBuilder()->enableAutoLayout(true);
        $this->viewBuilder()->setLayout('hello');
        $this->autoRender = true;
    }

    public function other(){
        $this->viewBuilder()->enableAutoLayout(false);
        $this->autoRender = true;
    }
    public function  query(){
        // $username = $this->request->getQuery("username");
        $username = $this->request['url']['username'];
        echo $username;
    }

    public function form() {
        $this->autoRender = true;
    }

}

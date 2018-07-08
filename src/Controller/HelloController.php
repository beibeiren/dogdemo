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
        //　http://localhost:8765/boards?username=123
        // $username = $this->request->getQuery("username");
        $username = $this->request['url']['username'];
        echo $username;
    }

    public function form() {
        $this->autoRender = true;
        if ($this->request->is('post')) {
            $chks = $this->request->getData('chks');
            var_dump($chks);
            exit;
        }
    }
    public function sendForm(){
         $this->autoRender = true;
         $str = $this->request->getData('HelloForm')['text1'];
         //$str = $data['text1'];
         var_dump($str);
         exit;
         $result = "";
         if ($str != ""){
            $result = "you type: " . $str;
         } else {
            $result = "empty.";
         }
         $this->set("result", h($result));

    }

}
<?php
namespace App\Controller;

use App\Controller\AppController;



class  JumpController extends AppController
{
   public $name = 'Jump';
    // public $autoRender = false;
    public function index()
    {
       if($this->request->is('post'))
        {
           $this->setAction("show");
        }
    }
    public function show()
    {
        if($this->request->is('post')){

        }

    }
    public function show1()
    {
        if($this->request->is('post')){
            $this->redirect("/jump/show2");
        }
    }

    public function show2()
    {
        if($this->request->is('post')){

        }
    }
}

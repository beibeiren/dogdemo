<?php
namespace App\Controller;

use App\Controller\AppController;



class  JumpController extends AppController
{
   public $name = 'Jump';
    // public $autoRender = false;
    
    public function index()
    {
       // GET请求  
       // <a href="" /> 
       // $this->redirect("/jump/show2");
       // $this->setAction("show");

       // POST请求  
       if($this->request->is('post'))
        {
           // GET请求，forward跳转到show(),请求地址不变
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
        // POST请求  
        if($this->request->is('post')){
            // GET请求，redirect跳转到show2(),请求地址改变
            $this->redirect("/jump/show2");
        }
    }

    public function show2()
    {
        if($this->request->is('post')){

        }
    }
}

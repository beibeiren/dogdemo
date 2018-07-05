<?php
namespace App\Controller;

use App\Controller\AppController;



class  FormsController extends AppController
{
    public function index()
    {
        if ($this->request->is(['post'])) {
          $data = $this->request->getData();
          $username = $data["username"];
          $password = $data["password"];
          var_dump($username,$password);
          exit;
        }
    }

}

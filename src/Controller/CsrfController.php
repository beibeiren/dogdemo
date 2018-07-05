<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Csrf Controller
 *
 *
 * @method \App\Model\Entity\Csrf[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CsrfController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('post')) {
            if (!empty($this->request->getData('name') && !empty($this->request->getData('password')))) {
                   $this->Flash->success('OK!', ['element' => 'success','key' => 'info']);
            } else {
                $this->Flash->error('Bad!', ['element' => 'error','key' => 'info']);
            }   
        }else {
            $this->Flash->set(' Please input form:', ['element' => 'info', 'key' => 'info']);
        }
    }
    
}

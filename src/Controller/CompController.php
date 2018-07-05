<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comp Controller
 *
 *
 * @method \App\Model\Entity\Comp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       $this->Flash->set('クッリクすると消えます。');
       $this->Flash->set(__('flash.message'));
       $this->Flash->success('成功しました', ['element' => 'flash']);
       $this->Flash->error('失敗です');
       $this->Flash->info('infoメッセージを表示する');
       $this->Flash->set('クッリクすると消えます。',['element' => 'info', 'key' => 'info']);
       $this->Flash->set('クッリクすると消えます。',['element' => 'error', 'key' => 'error']);
    }

    
}

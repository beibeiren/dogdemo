<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
use Cake\Event\Event;
/**
 * Boards Controller
 *
 * @property \App\Model\Table\BoardsTable $Boards
 *
 * @method \App\Model\Entity\Board[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoardsController extends AppController
{

    private $people;

    public $paginate = [
        'limit' => 5,
        'order' => [
            'id' => 'DESC'
        ],
        'contain' => ['People']
    ];

    public function  initialize()
    {
        parent::initialize();
        $this->people = TableRegistry::getTableLocator('People');
        //I18n::setLocale('ja_JP');
        $this->loadComponent('Paginator');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index()
    {
        // $boards = $this->Boards
        //    ->find('all')
        //    ->order(['Boards.id' => 'DESC'])
        //    ->contain(['People']);
        if($this->request->is('post')){
            $lang = $this->request->getData("lang");
            I18n::setLocale($lang);
        }

        $boards = $this->paginate($this->Boards);
        $this->set(compact('boards'));
        $this->set('count', $boards->count());
    }

    /**
     * View method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $board = $this->Boards->get($id, [
            'contain' => ['People']
        ]);

        $this->set('board', $board);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            if(!$this->people->checkNameAndPass($this->request->getData())) {
                $this->Flash->error('名前かパスワードを確認ください。');
            } else {
                $res = $this->people->find()
                    ->where(['name'=>$this->request->getData('name')])
                    ->andWhere(['password'=>$this->request->getData('password')])
                    ->first();
                $board = $this->Boards->newEntity();

                $board->name = $this->request->getData('name');
                $board->title = $this->request->getData('title');
                $board->content = $this->request->getData('content');
                $board->person_id = $res['id'];
                // var_dump($board);
                // exit;
                if($this->Boards->save($board)){
                  $this->redirect(['action' => 'index']);
                }
            }
        }
        $this->set('entity', $this->Boards->newEntity());
    }

    public function show($param = 0){
        $boards = $this->Boards
    ->find()
    ->where(['Boards.id'=>$param])
    ->contain(['People'])
    ->first();
   $this->set('boards',$boards);

    }

    public function show2($param = 0){
    $boards = $this->people->get($param);
    $this->set('boards',$boards);
}

    /**
     * Edit method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($param=0){
        if ($this->request->isPut()){
            $board = $this->Boards
                ->find()
                ->where(['Boards.id'=>$param])
                ->contain(['People'])
                ->first();
            $board->title = $this->request->getData('title');
            $board->content = $this->request->getData('content');
            $board->person_id = $this->request->getData('person_id');
            // var_dump($this->request->getData());
            // exit();
            if (!$this->people->checkNameAndPass($this->request->getData())){
                $this->Flash->error('名前かパスワードを確認ください。');
            } else {
                if($this->Boards->save($board)){
                    $this->redirect(['action' => 'index']);
                }
            }

        } else {
            $board =  $this->Boards
                ->find()
                ->where(['Boards.id'=>$param])
                ->contain(['People'])
                ->first();
        }

        $this->set('entity', $board);
    }

    /**
     * Delete method
     *
     * @param string|null $id Board id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $board = $this->Boards->get($id);
        if ($this->Boards->delete($board)) {
            $this->Flash->success(__('The board has been deleted.'));
        } else {
            $this->Flash->error(__('The board could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

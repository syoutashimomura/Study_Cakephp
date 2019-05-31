<?php
namespace App\Controller;

use \Exception;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
use Cake\View\Helper\FlashHelper;
use Cake\Controller\Component\FlashComponent;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 *
 */
class BoardsController extends AppController
{
    private $People;
    public $paginate = [
        'limit' => 5,
        'contain' => ['People'],
        'order' => [
            'id' => 'ASC',
            // 'People.name' => 'ASC',
        ],
        'sortWhitelist' => ['person.name','id','title']
    ];

    public function initialize()
    {
        parent::initialize();
        $this->People = TableRegistry::get('People');
        // $this->name = 'Boards';
        $this->loadComponent('Paginator');
        // $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $this->Flash->set('クリックすると消える');
        if ($this->RequestHandler->prefers('rss')) {
            $data = $this->Boards
                           ->find()
                           ->limit(10)
                           ->order(['id' => 'DESC']);
            $this->set(compact('data'));
        } else {
            $data = $this->paginate($this->Boards);
            $this->set('data', $data);
            $this->set('count', $data->count());
        }
    }

    public function addRecord()
    {
        if ($this->request->is('post')) {
            $board = $this->Boards->newEntity($this->request->getData());
            // $validator = new Validator();
            // $validator->email('name');
            // $errors = $validator->errors($this->request->getData());
            if (!empty($errors)) {
                // $this->Flash->error('EMAL ERROR!!');

                // $this->Flash->error(__('The book could not be saved. Please, try again.'));

            } else {
                if ($this->Boards->save($board)){
                    $this->redirect(['action' => 'index']);
                }
            }
            $this->set(['entity' => $board]);
        }
    }

    public function delRecord()
    {
        if ($this->request->is('post')) {
            try{
                // $entity = $this->Boards->get($this->request->getData('id'));
                $this->Boards->deleteAll(
                    [
                        'name' => $this->request->getData('name')
                    ]);
            } catch(Exception $e) {
                Log::write('debug', $e->getMessage());
            }
        }
        $this->redirect(['action' => 'index']);
    }

    public function edit($param = 0)
    {
        if ($this->request->is('put')) {
            $board = $this->Boards
                          ->find()
                          ->where(['Boards.id' => $param])
                          ->contain(['People'])
                          ->first();
            $board->title = $this->request->data['title'];
            $board->content = $this->request->data['content'];
            $board->people_id = $this->request->data['people_id'];

            if (!$this->People->checkNameAndPass($this->request->getData())) {
                $this->Flash->error('名前かパスワードを確認してください。');
            } else {
                if ($this->Boards->save($board)) {
                    $this->redirect(['action' => 'index']);
                }
            }
        } else {
            $board = $this->Boards->find()
                                  ->where(['Boards.id' => $param])
                                  ->contain(['People'])
                                  ->first();
        }

        $this->set('entity', $board);
    }

    public function add()
    {
        if ($this->request->isPost()) {
            if (!$this->People->checkNameAndPass($this->request->data)) {
                $this->Flash->error('名前かパスワードを確認してください。');
            } else {
                $res = $this->People->find()
                                    ->where([
                                        'name' => $this->request->getData('name'),
                                        'password' => $this->request->getData('password')
                                    ])
                                    ->first();
                $board = $this->Boards->newEntity();
                $board->name = $this->request->getData('name');
                $board->title = $this->request->getData('title');
                $board->conttent = $this->request->getData('content');
                $board->person_id = $res['id'];

                if ($this->Boards->save($board)) {
                    $this->redirect(['action' => 'index']);
                }
            }
        }
        $this->set('entity', $this->Boards->newEntity());
    }

    public function show($param = 0)
    {
        $data = $this->Boards->find()
                             ->where(['Boards.id' => $param])
                             ->contain(['People'])
                             ->first();
         $this->set('data', $data);
    }

    public function show2($param = 0)
    {
        $data = $this->People->get($param);
        $this->set('data', $data);
    }

}

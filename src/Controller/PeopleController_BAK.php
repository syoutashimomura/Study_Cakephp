<?php
namespace App\Controller;

use \Exception;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
use Cake\View\Helper\FlashHelper;
use Cake\Controller\Component\FlashComponent;
use App\Controller\AppController;

class PeopleController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->name = 'People';
    }

    public function index($id = null)
    {
        $this->People->hasOne('Boards');
        $data = $this->People
                     ->find('all');
        $this->set('data', $data);
    }


}

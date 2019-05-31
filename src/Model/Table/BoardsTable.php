<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 *
 */
class BoardsTable extends Table
{
    public $qdata = null;

    // public function beforeFind(Event $event, Query $query)
    // {
    //     $query->order(['name' => 'ASC']);
    // }
    //
    // public function beforeSave($event, $entity, $options)
    // {
    //     $n = $this->find('all', ['conditions' => ['name' => $entity->name]])->count();
    //     if ($n == 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function initialize(array $config)
    {
        $this->belongsTo('People');
    }

    public static function defaultConnectionName()
    {
        return 'default';
    }

    public function validationDefault(Validator $validator)
    {
        // $validator = new Validator();
        $validator->integer('id');

        $validator->integer('person_id')
                  ->requirePresence('person_id');

        $validator->notEmpty('name','必須項目です。');

        $validator->notEmpty('title','必須項目です。');

        $validator->notEmpty('content','必須項目です。');

        // $validator->add('name','maxRecords',
        //             [
        //                 'rule' => ['maxRecords','name',5],
        //                 'message' => __('最大数を超えています。'),
        //                 'provider' => 'table',
        //             ]);

        return $validator;
    }

    // public function buildRules(RulesChecker $rules){
    //     $rules->add($rules->isUnique(['name','title'], 'すでに登録済みです。'));
    //     return $rules;
    // }

    public function maxRecords($data, $field, $num)
    {
        $n = $this->find()
                  ->where([$field => $data])
                  ->count();
        return $n < $num ? true : false;
    }

}

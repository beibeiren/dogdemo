<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * People Model
 *
 * @property \App\Model\Table\BoardsTable|\Cake\ORM\Association\HasMany $Boards
 *
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, callable $callback = null, $options = [])
 */
class PeopleTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('people');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Boards', [
            'foreignKey' => 'person_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmpty('name','必須項目です。');

        $validator
            ->scalar('password')
            ->maxLength('password', 45)
            ->requirePresence('password', 'create')
            ->notEmpty('password','必須項目です。');

        $validator
            ->scalar('comment')
            ->notEmpty('comment','必須項目です。');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->isUnique(['name'],'既に登録済みです。');
        return $rules;
    }

    public function checkNameAndPass($data){
        $n = $this->find()
            ->where(['name' => $data['name']])
            ->andWhere(['password' => $data['password']])
            ->count();
        return $n > 0 ? true : false;
    }
}

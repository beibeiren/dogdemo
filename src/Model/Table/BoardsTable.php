<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Boards Model
 *
 * @property \App\Model\Table\PeopleTable|\Cake\ORM\Association\BelongsTo $People
 *
 * @method \App\Model\Entity\Board get($primaryKey, $options = [])
 * @method \App\Model\Entity\Board newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Board[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Board|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Board|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Board patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Board[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Board findOrCreate($search, callable $callback = null, $options = [])
 */
class BoardsTable extends Table
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

        $this->setTable('boards');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('People', [
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
            ->integer('person_id')
            ->requirePresence('person_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->notEmpty('title','必須項目です。');

        $validator
            ->scalar('content')
            ->notEmpty('content','必須項目です。');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['person_id'], 'People'));

        return $rules;
    }
}

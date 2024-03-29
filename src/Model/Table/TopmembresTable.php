<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Topmembres Model
 *
 * @method \App\Model\Entity\Topmembre get($primaryKey, $options = [])
 * @method \App\Model\Entity\Topmembre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Topmembre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Topmembre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Topmembre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Topmembre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Topmembre findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TopmembresTable extends Table
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

        $this->setTable('topmembres');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('iduser')
            ->requirePresence('iduser', 'create')
            ->notEmpty('iduser');

        return $validator;
    }
}

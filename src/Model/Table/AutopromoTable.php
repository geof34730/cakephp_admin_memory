<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Autopromo Model
 *
 * @method \App\Model\Entity\Autopromo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Autopromo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Autopromo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Autopromo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Autopromo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Autopromo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Autopromo findOrCreate($search, callable $callback = null, $options = [])
 */
class AutopromoTable extends Table
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

        $this->setTable('autopromo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
/*
        $validator
            ->requirePresence('urllink1', 'create')
            ->notEmpty('urllink1');

        $validator
            ->requirePresence('urllink2', 'create')
            ->notEmpty('urllink2');

        $validator
            ->requirePresence('urllink3', 'create')
            ->notEmpty('urllink3');
*/
        $validator
            ->integer('guidvisuel1')
            ->requirePresence('guidvisuel1', 'create')
            ->notEmpty('guidvisuel1');

        $validator
            ->integer('guidvisuel2')
            ->requirePresence('guidvisuel2', 'create')
            ->notEmpty('guidvisuel2');

        $validator
            ->integer('guidvisuel3')
            ->requirePresence('guidvisuel3', 'create')
            ->notEmpty('guidvisuel3');

        $validator
            ->boolean('targetblank1')
            ->requirePresence('targetblank1', 'create')
            ->notEmpty('targetblank1');

        $validator
            ->boolean('targetblank2')
            ->requirePresence('targetblank2', 'create')
            ->notEmpty('targetblank2');

        $validator
            ->boolean('targetblank3')
            ->requirePresence('targetblank3', 'create')
            ->notEmpty('targetblank3');

        $validator
            ->requirePresence('typeautopromo', 'create')
            ->notEmpty('typeautopromo');

        return $validator;
    }
}

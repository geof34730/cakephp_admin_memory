<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Auteursrealisateursartistes Model
 *
 * @method \App\Model\Entity\Auteursrealisateursartiste get($primaryKey, $options = [])
 * @method \App\Model\Entity\Auteursrealisateursartiste newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Auteursrealisateursartiste[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Auteursrealisateursartiste|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Auteursrealisateursartiste patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Auteursrealisateursartiste[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Auteursrealisateursartiste findOrCreate($search, callable $callback = null, $options = [])
 */
class AuteursrealisateursartistesTable extends Table
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

        $this->setTable('auteursrealisateursartistes');
        $this->setDisplayField('idara');
        $this->setPrimaryKey('idara');
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
            ->integer('idara')
            ->allowEmpty('idara', 'create');

        $validator
            ->allowEmpty('typeara');

        $validator
            ->requirePresence('nomara', 'create')
            ->notEmpty('nomara');

        $validator
            ->boolean('onlineara')
            ->requirePresence('onlineara', 'create')
            ->notEmpty('onlineara');

        return $validator;
    }
}

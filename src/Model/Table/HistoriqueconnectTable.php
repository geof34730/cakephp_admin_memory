<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Historiqueconnect Model
 *
 * @method \App\Model\Entity\Historiqueconnect get($primaryKey, $options = [])
 * @method \App\Model\Entity\Historiqueconnect newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Historiqueconnect[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Historiqueconnect|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Historiqueconnect patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Historiqueconnect[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Historiqueconnect findOrCreate($search, callable $callback = null, $options = [])
 */
class HistoriqueconnectTable extends Table
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

        $this->setTable('historiqueconnect');
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

        $validator
            ->integer('iduserconnect')
            ->requirePresence('iduserconnect', 'create')
            ->notEmpty('iduserconnect');

        $validator
            ->integer('codeconnect')
            ->requirePresence('codeconnect', 'create')
            ->notEmpty('codeconnect');

        $validator
            ->dateTime('dateconnect')
            ->allowEmpty('dateconnect');

        return $validator;
    }
}

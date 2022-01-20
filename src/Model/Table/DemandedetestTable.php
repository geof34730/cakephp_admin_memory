<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Demandedetest Model
 *
 * @method \App\Model\Entity\Demandedetest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Demandedetest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Demandedetest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Demandedetest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Demandedetest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Demandedetest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Demandedetest findOrCreate($search, callable $callback = null, $options = [])
 */
class DemandedetestTable extends Table
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

        $this->setTable('demandedetest');
        $this->setDisplayField('iddemande');
        $this->setPrimaryKey('iddemande');
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
            ->integer('iddemande')
            ->allowEmpty('iddemande', 'create');

        $validator
            ->integer('idProduit')
            ->requirePresence('idProduit', 'create')
            ->notEmpty('idProduit');

        $validator
            ->integer('idtas')
            ->allowEmpty('idtas');

        $validator
            ->integer('idUser')
            ->requirePresence('idUser', 'create')
            ->notEmpty('idUser');

        $validator
            ->dateTime('datedemande')
            ->requirePresence('datedemande', 'create')
            ->notEmpty('datedemande');

        $validator
            ->allowEmpty('role');

        return $validator;
    }
}

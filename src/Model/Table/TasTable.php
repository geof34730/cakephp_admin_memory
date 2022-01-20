<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tas Model
 *
 * @method \App\Model\Entity\Ta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ta findOrCreate($search, callable $callback = null, $options = [])
 */
class TasTable extends Table
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

        $this->setTable('tas');
        $this->setDisplayField('idtas');
        $this->setPrimaryKey('idtas');
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
            ->integer('idtas')
            ->allowEmpty('idtas', 'create')
            ->add('idtas', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('idproduit')
            ->requirePresence('idproduit', 'create')
            ->notEmpty('idproduit');

        $validator
            ->date('dateBeginDemande')
            ->requirePresence('dateBeginDemande', 'create')
            ->notEmpty('dateBeginDemande');

        $validator
            ->date('dateEndDemande')
            ->requirePresence('dateEndDemande', 'create')
            ->notEmpty('dateEndDemande');

        $validator
            ->date('dateBeginTest')
            ->allowEmpty('dateBeginTest');

        $validator
            ->date('dateEndTest')
            ->allowEmpty('dateEndTest');

        $validator
            ->integer('nombredeproduittest')
            ->allowEmpty('nombredeproduittest');

        $validator
            ->date('dateTas')
            ->allowEmpty('dateTas');

        $validator
            ->boolean('tas')
            ->requirePresence('tas', 'create')
            ->notEmpty('tas');

        $validator
            ->date('dateBeginTest')->notEmpty('dateBeginTest', 'Merci de renseigner une date de début de test');

        $validator
            ->date('dateEndTest')->notEmpty('dateEndTest', 'Merci de renseigner une date de fin de test');
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
        $rules->add($rules->isUnique(['idtas']));

        return $rules;
    }
}

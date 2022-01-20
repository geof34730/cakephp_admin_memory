<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Track Model
 *
 * @method \App\Model\Entity\Track get($primaryKey, $options = [])
 * @method \App\Model\Entity\Track newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Track[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Track|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Track patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Track[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Track findOrCreate($search, callable $callback = null, $options = [])
 */
class TrackTable extends Table
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

        $this->setTable('track');
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
            ->allowEmpty('guid');

        $validator
            ->allowEmpty('redirecturl');

        $validator
            ->allowEmpty('libelle');

        $validator
            ->integer('countvisite')
            ->requirePresence('countvisite', 'create')
            ->notEmpty('countvisite');

        $validator
            ->dateTime('datesaisieop')
            ->requirePresence('datesaisieop', 'create')
            ->notEmpty('datesaisieop');

        return $validator;
    }
}

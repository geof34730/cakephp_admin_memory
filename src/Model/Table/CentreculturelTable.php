<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centreculturel Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Centreculturel
 *
 * @method \App\Model\Entity\Centreculturel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Centreculturel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Centreculturel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Centreculturel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centreculturel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Centreculturel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Centreculturel findOrCreate($search, callable $callback = null, $options = [])
 */
class CentreculturelTable extends Table
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

        $this->setTable('centreculturel');
        $this->setDisplayField('centreculturel_id');
        $this->setPrimaryKey('centreculturel_id');

        $this->belongsTo('Centreculturel', [
            'foreignKey' => 'centreculturel_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('centreculturel_codepostal');

        $validator
            ->allowEmpty('centreculturel_nom');

        $validator
            ->integer('centreculturel_panonceau')
            ->allowEmpty('centreculturel_panonceau');

        $validator
            ->requirePresence('centreculturel_valuefield', 'create')
            ->notEmpty('centreculturel_valuefield');

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
        $rules->add($rules->existsIn(['centreculturel_id'], 'Centreculturel'));

        return $rules;
    }
}

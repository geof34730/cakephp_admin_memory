<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Translation Model
 *
 * @method \App\Model\Entity\Translation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Translation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Translation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Translation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Translation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Translation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Translation findOrCreate($search, callable $callback = null, $options = [])
 */
class TranslationTable extends Table
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

        $this->setTable('translation');
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
            ->allowEmpty('textReferenceFr');

        $validator
            ->allowEmpty('jsonTranslate');

        $validator
            ->dateTime('dateTranslate')
            ->requirePresence('dateTranslate', 'create')
            ->notEmpty('dateTranslate');

        return $validator;
    }
}

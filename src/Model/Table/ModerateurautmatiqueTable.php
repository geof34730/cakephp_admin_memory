<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Moderateurautmatique Model
 *
 * @method \App\Model\Entity\Moderateurautmatique get($primaryKey, $options = [])
 * @method \App\Model\Entity\Moderateurautmatique newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Moderateurautmatique[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Moderateurautmatique|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Moderateurautmatique patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Moderateurautmatique[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Moderateurautmatique findOrCreate($search, callable $callback = null, $options = [])
 */
class ModerateurautmatiqueTable extends Table
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

        $this->setTable('moderateurautmatique');
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
            ->requirePresence('keyblacklist', 'create')
            ->notEmpty('keyblacklist');

        return $validator;
    }
}

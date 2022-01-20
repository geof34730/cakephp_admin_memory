<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lastcron Model
 *
 * @method \App\Model\Entity\Lastcron get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lastcron newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lastcron[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lastcron|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lastcron patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lastcron[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lastcron findOrCreate($search, callable $callback = null, $options = [])
 */
class LastcronTable extends Table
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

        $this->setTable('lastcron');
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
            ->dateTime('datelastcron')
            ->requirePresence('datelastcron', 'create')
            ->notEmpty('datelastcron');

        return $validator;
    }
}

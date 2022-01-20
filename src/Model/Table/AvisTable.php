<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avis Model
 *
 * @method \App\Model\Entity\Avi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Avi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Avi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Avi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Avi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Avi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Avi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AvisTable extends Table
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

        $this->setTable('avis');
        $this->setDisplayField('idavis');
        $this->setPrimaryKey('idavis');

        $this->addBehavior('Timestamp');
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
            ->integer('idavis')
            ->allowEmpty('idavis', 'create');

        $validator
            ->integer('idproduit')
            ->requirePresence('idproduit', 'create')
            ->notEmpty('idproduit');

        $validator
            ->integer('iduser')
            ->requirePresence('iduser', 'create')
            ->notEmpty('iduser');

        $validator
            ->allowEmpty('phraseresenti');

        $validator
            ->integer('note')
            ->allowEmpty('note');

        $validator
            ->allowEmpty('commentaire');

        $validator
            ->allowEmpty('role');

        $validator
            ->boolean('moderationauto')
            ->requirePresence('moderationauto', 'create')
            ->notEmpty('moderationauto');

        return $validator;
    }
}

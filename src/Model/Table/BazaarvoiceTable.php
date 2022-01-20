<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bazaarvoice Model
 *
 * @method \App\Model\Entity\Bazaarvoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bazaarvoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bazaarvoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bazaarvoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bazaarvoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bazaarvoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bazaarvoice findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BazaarvoiceTable extends Table
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

        $this->setTable('bazaarvoice');
        $this->setDisplayField('title');
        $this->setPrimaryKey('idbv');

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
            ->integer('idbv')
            ->allowEmpty('idbv', 'create');

        $validator
            ->integer('idavis')
            ->requirePresence('idavis', 'create')
            ->notEmpty('idavis');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('submissionid')
            ->allowEmpty('submissionid');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('error');

        $validator
            ->integer('iduser')
            ->allowEmpty('iduser');

        $validator
            ->integer('note')
            ->allowEmpty('note');

        $validator
            ->requirePresence('phraseresenti1', 'create')
            ->notEmpty('phraseresenti1');

        $validator
            ->requirePresence('phraseresenti2', 'create')
            ->notEmpty('phraseresenti2');

        $validator
            ->requirePresence('phraseresenti3', 'create')
            ->notEmpty('phraseresenti3');

        $validator
            ->integer('idproduit')
            ->requirePresence('idproduit', 'create')
            ->notEmpty('idproduit');

        $validator
            ->dateTime('createdcommunaute')
            ->allowEmpty('createdcommunaute');

        return $validator;
    }
}

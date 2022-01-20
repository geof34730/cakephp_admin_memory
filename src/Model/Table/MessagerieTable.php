<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messagerie Model
 *
 * @method \App\Model\Entity\Messagerie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Messagerie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Messagerie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Messagerie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Messagerie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Messagerie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Messagerie findOrCreate($search, callable $callback = null, $options = [])
 */
class MessagerieTable extends Table
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

        $this->setTable('messagerie');
        $this->setDisplayField('idmessage');
        $this->setPrimaryKey('idmessage');
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
            ->integer('idmessage')
            ->allowEmpty('idmessage', 'create');

        $validator
            ->integer('idUserExpediteur')
            ->requirePresence('idUserExpediteur', 'create')
            ->notEmpty('idUserExpediteur');

        $validator
            ->integer('idUserDestinateire')
            ->requirePresence('idUserDestinateire', 'create')
            ->notEmpty('idUserDestinateire');

        $validator
            ->integer('lu')
            ->requirePresence('lu', 'create')
            ->notEmpty('lu');

        $validator
            ->integer('idMessageParent')
            ->allowEmpty('idMessageParent');

        $validator
            ->dateTime('datecreated')
            ->requirePresence('datecreated', 'create')
            ->notEmpty('datecreated');

        $validator
            ->requirePresence('objetMessage', 'create')
            ->notEmpty('objetMessage');

        $validator
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->integer('deleteDestinataire')
            ->requirePresence('deleteDestinataire', 'create')
            ->notEmpty('deleteDestinataire');

        $validator
            ->allowEmpty('historiquemessage');

        return $validator;
    }
}

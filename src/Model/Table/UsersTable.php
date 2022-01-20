<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('civilite');

        $validator
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom');

        $validator
            ->allowEmpty('username');

        $validator
            ->allowEmpty('password');

        $validator
            ->allowEmpty('role');

        $validator
            ->dateTime('dateblocked')
            ->requirePresence('dateblocked', 'create')
            ->notEmpty('dateblocked');

        $validator
            ->dateTime('passwordModifed')
            ->allowEmpty('passwordModifed');

        $validator
            ->requirePresence('pseudo', 'create')
            ->notEmpty('pseudo');

        $validator
            ->boolean('inscriptionValide')
            ->requirePresence('inscriptionValide', 'create')
            ->notEmpty('inscriptionValide');

        $validator
            ->allowEmpty('UUID');

        $validator
            ->allowEmpty('adresse');

        $validator
            ->allowEmpty('ville');

        $validator
            ->integer('codePostal')
            ->allowEmpty('codePostal');

        $validator
            ->allowEmpty('complementAdresse');

        $validator
            ->integer('departement')
            ->allowEmpty('departement');

        $validator
            ->integer('espaceculturel')
            ->allowEmpty('espaceculturel');

        $validator
            ->allowEmpty('numerosCarteLeclerc');

        $validator
            ->allowEmpty('avatar');

        $validator
            ->allowEmpty('avatarExtension');

        $validator
            ->boolean('blacklist')
            ->requirePresence('blacklist', 'create')
            ->notEmpty('blacklist');

        $validator
            ->integer('demande_reponse_negative')
            ->requirePresence('demande_reponse_negative', 'create')
            ->notEmpty('demande_reponse_negative');

        $validator
            ->integer('nombreTestRealise')
            ->requirePresence('nombreTestRealise', 'create')
            ->notEmpty('nombreTestRealise');

        $validator
            ->integer('cumuleNoteAvis')
            ->requirePresence('cumuleNoteAvis', 'create')
            ->notEmpty('cumuleNoteAvis');

        $validator
            ->allowEmpty('facebookId');

        $validator
            ->allowEmpty('facebookPicture');

        $validator
            ->boolean('optim1')
            ->requirePresence('optim1', 'create')
            ->notEmpty('optim1');

        $validator
            ->boolean('optim2')
            ->requirePresence('optim2', 'create')
            ->notEmpty('optim2');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}

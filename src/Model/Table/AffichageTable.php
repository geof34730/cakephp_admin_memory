<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Affichage Model
 *
 * @method \App\Model\Entity\Affichage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Affichage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Affichage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Affichage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Affichage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Affichage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Affichage findOrCreate($search, callable $callback = null, $options = [])
 */
class AffichageTable extends Table
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

        $this->setTable('affichage');
        $this->setDisplayField('idaffichage');
        $this->setPrimaryKey('idaffichage');
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
            ->integer('idaffichage')
            ->allowEmpty('idaffichage', 'create');

        $validator
            ->allowEmpty('typeaffichage');

        $validator
            ->integer('produitavis1')
            ->allowEmpty('produitavis1');

        $validator
            ->integer('produitavis2')
            ->allowEmpty('produitavis2');

        $validator
            ->integer('produitavis3')
            ->allowEmpty('produitavis3');

        $validator
            ->integer('produitavis4')
            ->allowEmpty('produitavis4');

        $validator
            ->integer('produitavis5')
            ->allowEmpty('produitavis5');

        $validator
            ->integer('produitavis6')
            ->allowEmpty('produitavis6');

        $validator
            ->integer('produitavis7')
            ->allowEmpty('produitavis7');

        $validator
            ->integer('produitavis8')
            ->allowEmpty('produitavis8');

        $validator
            ->integer('produitavis9')
            ->allowEmpty('produitavis9');

        $validator
            ->integer('produitavis10')
            ->allowEmpty('produitavis10');

        $validator
            ->integer('produitdemande1')
            ->allowEmpty('produitdemande1');

        $validator
            ->integer('produitdemande2')
            ->allowEmpty('produitdemande2');

        $validator
            ->integer('produitdemande3')
            ->allowEmpty('produitdemande3');

        $validator
            ->integer('produitencours1')
            ->allowEmpty('produitencours1');

        $validator
            ->integer('produitencours2')
            ->allowEmpty('produitencours2');

        $validator
            ->integer('produitencours3')
            ->allowEmpty('produitencours3');

        return $validator;
    }
}

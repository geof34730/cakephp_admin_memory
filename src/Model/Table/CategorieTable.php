<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categorie Model
 *
 * @method \App\Model\Entity\Categorie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Categorie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Categorie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Categorie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Categorie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Categorie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Categorie findOrCreate($search, callable $callback = null, $options = [])
 */
class CategorieTable extends Table
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

        $this->setTable('categorie');
        $this->setDisplayField('idcategorie');
        $this->setPrimaryKey('idcategorie');
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
            ->integer('idcategorie')
            ->allowEmpty('idcategorie', 'create');

        $validator
            ->requirePresence('idcategorieleclerc', 'create')
            ->notEmpty('idcategorieleclerc');

        $validator
            ->requirePresence('libellecategorie', 'create')
            ->notEmpty('libellecategorie');

        $validator
            ->allowEmpty('alllibellecategories');

        $validator
            ->allowEmpty('slug');
        $validator
            ->allowEmpty('sluglight');

        $validator
            ->integer('niveau')
            ->allowEmpty('niveau');

        $validator
            ->allowEmpty('n1');

        $validator
            ->allowEmpty('n2');

        $validator
            ->boolean('online')
            ->requirePresence('online', 'create')
            ->notEmpty('online');

        return $validator;
    }
}

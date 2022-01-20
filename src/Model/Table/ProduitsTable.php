<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produits Model
 *
 * @method \App\Model\Entity\Produit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProduitsTable extends Table
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

        $this->setTable('produits');
        $this->setDisplayField('title');
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
            ->notEmpty('title', 'Merci de renseigner un titre');

        $validator
            ->allowEmpty('slug');

        $validator
            ->notEmpty('description', 'Merci de renseigner une description');
        $validator
            ->allowEmpty('auteur');

        $validator
            ->allowEmpty('realisateur');

        $validator
            ->allowEmpty('acteur');

        $validator
            ->allowEmpty('editeurmarque');

        $validator
            ->allowEmpty('artiste');

        $validator
            ->notEmpty('urlVignette', 'Merci de renseigner une url de vignette');
        $validator
            ->notEmpty('EAN', 'Merci de renseigner une code EAN');

        $validator
            ->allowEmpty('typeproduit');

        $validator
            ->boolean('online')
            ->allowEmpty('online');



        $validator
            ->date('dateBeginDemandeTest')->notEmpty('dateBeginDemandeTest', 'Merci de renseigner une date de début de demande de test');
        $validator
            ->date('dateEndDemandeTest')->notEmpty('dateEndDemandeTest', 'Merci de renseigner une date de fin de demande de test');

        $validator
            ->date('dateBeginTest')->notEmpty('dateBeginTest', 'Merci de renseigner une date de début de test');
        $validator
            ->date('dateEndTest')->notEmpty('dateEndTest', 'Merci de renseigner une date de fin de test');

        $validator
            ->date('datesortie')->notEmpty('datesortie', 'Merci de renseigner une date de sortie');

        $validator
            ->notEmpty('categorie1', 'Merci de selectionner une catégorie');
        $validator
            ->notEmpty('categorie2', 'Merci de selectionner une catégorie de niveau 2');
        /*$validator
            ->notEmpty('categorie3', 'Merci de selectionner une catégorie de niveau 3');*/
        $validator
            ->integer('nombredeproduittest')
            ->notEmpty('nombredeproduittest', 'Merci de renseigner le nombre de produits à tester');



        return $validator;
    }
}

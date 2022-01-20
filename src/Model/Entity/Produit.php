<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produit Entity
 *
 * @property int $id
 * @property int $EAN
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $auteur
 * @property string $realisateur
 * @property string $acteur
 * @property string $artiste
 * @property string $urlVignette
 * @property string $typeproduit
 * @property bool $online
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 * @property string $urlFicheProduit
 * @property \Cake\I18n\FrozenDate $dateBeginDemandeTest
 * @property \Cake\I18n\FrozenDate $dateEndDemandeTest
 * @property int $nombredeproduittest
 * @property \Cake\I18n\FrozenDate $dateBeginTest
 * @property \Cake\I18n\FrozenDate $dateEndTest
 * @property \Cake\I18n\FrozenDate $datesortie
 * @property bool $enabledsource
 * @property string $categorie1
 * @property string $categorie2
 * @property string $categorie3
 * @property int $auteur1
 * @property int $auteur2
 * @property int $auteur3
 * @property int $auteur4
 * @property int $auteur5
 * @property int $auteur6
 * @property int $auteur7
 * @property int $auteur8
 * @property int $auteur9
 * @property int $auteur10
 * @property int $realisateur1
 * @property int $realisateur2
 * @property int $realisateur3
 * @property int $realisateur4
 * @property int $realisateur5
 * @property int $realisateur6
 * @property int $realisateur7
 * @property int $realisateur8
 * @property int $realisateur9
 * @property int $realisateur10
 * @property int $acteur1
 * @property int $acteur2
 * @property int $acteur3
 * @property int $acteur4
 * @property int $acteur5
 * @property int $acteur6
 * @property int $acteur7
 * @property int $acteur8
 * @property int $acteur9
 * @property int $acteur10
 * @property int $artiste1
 * @property int $artiste2
 * @property int $artiste3
 * @property int $artiste4
 * @property int $artiste5
 * @property int $artiste6
 * @property int $artiste7
 * @property int $artiste8
 * @property int $artiste9
 * @property int $artiste10
 * @property int $notemoyenne
 * @property int $nombredemandedetest
 * @property int $tas
 */
class Produit extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

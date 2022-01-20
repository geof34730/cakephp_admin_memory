<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Categorie Entity
 *
 * @property int $idcategorie
 * @property string $idcategorieleclerc
 * @property string $libellecategorie
 * @property string $alllibellecategories
 * @property string $slug
 * @property int $niveau
 * @property string $n1
 * @property string $n2
 * @property bool $online
 */
class Categorie extends Entity
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
        'idcategorie' => false
    ];
}

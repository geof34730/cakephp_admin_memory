<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Affichage Entity
 *
 * @property int $idaffichage
 * @property string $typeaffichage
 * @property int $produitavis1
 * @property int $produitavis2
 * @property int $produitavis3
 * @property int $produitavis4
 * @property int $produitavis5
 * @property int $produitavis6
 * @property int $produitavis7
 * @property int $produitavis8
 * @property int $produitavis9
 * @property int $produitavis10
 * @property int $produitdemande1
 * @property int $produitdemande2
 * @property int $produitdemande3
 * @property int $produitencours1
 * @property int $produitencours2
 * @property int $produitencours3
 */
class Affichage extends Entity
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
        'idaffichage' => false
    ];
}

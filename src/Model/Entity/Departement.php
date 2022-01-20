<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Departement Entity
 *
 * @property int $departement_id
 * @property string $departement_code
 * @property string $departement_nom
 * @property string $departement_nom_uppercase
 * @property string $departement_slug
 * @property string $departement_nom_soundex
 *
 * @property \App\Model\Entity\Departement $departement
 */
class Departement extends Entity
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
        'departement_id' => false
    ];
}

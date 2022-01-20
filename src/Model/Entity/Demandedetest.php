<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Demandedetest Entity
 *
 * @property int $iddemande
 * @property int $idProduit
 * @property int $idtas
 * @property int $idUser
 * @property \Cake\I18n\FrozenTime $datedemande
 * @property string $role
 */
class Demandedetest extends Entity
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
        'iddemande' => false
    ];
}

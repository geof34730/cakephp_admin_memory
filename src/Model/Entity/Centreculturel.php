<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Centreculturel Entity
 *
 * @property int $centreculturel_id
 * @property string $centreculturel_codepostal
 * @property string $centreculturel_nom
 * @property int $centreculturel_panonceau
 * @property string $centreculturel_valuefield
 *
 * @property \App\Model\Entity\Centreculturel $centreculturel
 */
class Centreculturel extends Entity
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
        'centreculturel_id' => false
    ];
}

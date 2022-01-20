<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Autopromo Entity
 *
 * @property int $id
 * @property string $urllink1
 * @property string $urllink2
 * @property string $urllink3
 * @property int $guidvisuel1
 * @property int $guidvisuel2
 * @property int $guidvisuel3
 * @property bool $targetblank1
 * @property bool $targetblank2
 * @property bool $targetblank3
 * @property string $typeautopromo
 */
class Autopromo extends Entity
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

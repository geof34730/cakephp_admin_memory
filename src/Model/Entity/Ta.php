<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ta Entity
 *
 * @property int $idtas
 * @property int $idproduit
 * @property \Cake\I18n\FrozenDate $dateBeginDemande
 * @property \Cake\I18n\FrozenDate $dateEndDemande
 * @property \Cake\I18n\FrozenDate $dateBeginTest
 * @property \Cake\I18n\FrozenDate $dateEndTest
 * @property int $nombredeproduittest
 * @property \Cake\I18n\FrozenDate $dateTas
 * @property bool $tas
 */
class Ta extends Entity
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
        'idtas' => false
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Avi Entity
 *
 * @property int $idavis
 * @property int $idproduit
 * @property \Cake\I18n\FrozenTime $created
 * @property int $iduser
 * @property string $phraseresenti
 * @property int $note
 * @property string $commentaire
 * @property string $role
 * @property bool $moderationauto
 */
class Avi extends Entity
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
        'idavis' => false
    ];
}

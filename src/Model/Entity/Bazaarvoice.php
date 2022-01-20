<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bazaarvoice Entity
 *
 * @property int $idbv
 * @property int $idavis
 * @property string $type
 * @property int $submissionid
 * @property string $title
 * @property string $error
 * @property \Cake\I18n\FrozenTime $created
 * @property int $iduser
 * @property int $note
 * @property string $phraseresenti1
 * @property string $phraseresenti2
 * @property string $phraseresenti3
 * @property int $idproduit
 * @property \Cake\I18n\FrozenTime $createdcommunaute
 */
class Bazaarvoice extends Entity
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
        'idbv' => false
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Messagerie Entity
 *
 * @property int $idmessage
 * @property int $idUserExpediteur
 * @property int $idUserDestinateire
 * @property int $lu
 * @property int $idMessageParent
 * @property \Cake\I18n\FrozenTime $datecreated
 * @property string $objetMessage
 * @property string $message
 * @property int $deleteDestinataire
 * @property string $historiquemessage
 */
class Messagerie extends Entity
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
        'idmessage' => false
    ];
}

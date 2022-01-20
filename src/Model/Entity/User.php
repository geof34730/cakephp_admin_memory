<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $civilite
 * @property string $nom
 * @property string $prenom
 * @property string $username
 * @property string $password
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $dateblocked
 * @property \Cake\I18n\FrozenTime $passwordModifed
 * @property string $pseudo
 * @property bool $inscriptionValide
 * @property string $UUID
 * @property string $adresse
 * @property string $ville
 * @property int $codePostal
 * @property string $complementAdresse
 * @property int $departement
 * @property int $espaceculturel
 * @property string $numerosCarteLeclerc
 * @property string $avatar
 * @property string $avatarExtension
 * @property bool $blacklist
 * @property int $demande_reponse_negative
 * @property int $nombreTestRealise
 * @property int $cumuleNoteAvis
 * @property string $facebookId
 * @property string $facebookPicture
 * @property bool $optim1
 * @property bool $optim2
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}

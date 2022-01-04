<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $Id
 * @property string|null $Username
 * @property string|null $Name
 * @property string|null $Password
 * @property string|null $Phonenumber
 * @property string|null $Type
 * @property \Cake\I18n\FrozenTime|null $Creation_Date
 * @property \Cake\I18n\FrozenTime|null $Update_Date
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
        'Username' => true,
        'Name' => true,
        'Password' => true,
        'Phonenumber' => true,
        'Type' => true,
        'Creation_Date' => true,
        'Update_Date' => true,
    ];
    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}

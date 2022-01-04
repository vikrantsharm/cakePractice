<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notice Entity
 *
 * @property int $id
 * @property string|null $Subject
 * @property string|null $Content
 * @property int|null $Author
 * @property \Cake\I18n\FrozenTime|null $Creation_Date
 * @property \Cake\I18n\FrozenTime|null $Update_Date
 * @property bool|null $IsDeleted
 */
class Notice extends Entity
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
        'Subject' => true,
        'Content' => true,
        'Author' => true,
        'Creation_Date' => true,
        'Update_Date' => true,
        'IsDeleted' => true,
    ];
}

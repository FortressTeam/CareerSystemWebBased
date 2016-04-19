<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Administrator Entity.
 *
 * @property int $id
 * @property string $administrator_name
 * @property string $administrator_phone_number
 * @property \Cake\I18n\Time $administrator_date_of_birth
 * @property string $administrator_address
 * @property \App\Model\Entity\Log[] $logs
 */
class Administrator extends Entity
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
        'id' => false,
    ];
}

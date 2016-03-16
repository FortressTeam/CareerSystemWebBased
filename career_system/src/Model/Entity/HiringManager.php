<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HiringManager Entity.
 *
 * @property int $id
 * @property string $hiring_manager_name
 * @property string $hiring_manager_phone_number
 * @property string $company_name
 * @property string $company_address
 * @property int $company_size
 * @property string $company_about
 * @property string $company_logo
 * @property \App\Model\Entity\Appointment[] $appointments
 * @property \App\Model\Entity\Follow[] $follow
 * @property \App\Model\Entity\Post[] $posts
 */
class HiringManager extends Entity
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

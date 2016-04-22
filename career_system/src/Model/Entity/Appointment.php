<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appointment Entity.
 *
 * @property int $id
 * @property string $appointment_name
 * @property string $appointment_description
 * @property \Cake\I18n\Time $appointment_start
 * @property \Cake\I18n\Time $appointment_end
 * @property string $appointment_address
 * @property int $appointment_SMS_alert
 * @property int $hiring_manager_id
 * @property \App\Model\Entity\HiringManager $hiring_manager
 * @property \App\Model\Entity\AppointmentsHasApplicant[] $appointments_has_applicants
 */
class Appointment extends Entity
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

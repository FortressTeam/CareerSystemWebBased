<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PersonalHistory Entity.
 *
 * @property int $id
 * @property string $personal_history_title
 * @property string $personal_history_detail
 * @property \Cake\I18n\Time $personal_history_start
 * @property \Cake\I18n\Time $personal_history_end
 * @property int $personal_history_type_id
 * @property \App\Model\Entity\PersonalHistoryType $personal_history_type
 * @property int $applicant_id
 * @property \App\Model\Entity\Applicant $applicant
 */
class PersonalHistory extends Entity
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

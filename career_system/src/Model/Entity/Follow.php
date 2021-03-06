<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Follow Entity.
 *
 * @property int $hiring_manager_id
 * @property \App\Model\Entity\HiringManager $hiring_manager
 * @property int $applicant_id
 * @property \App\Model\Entity\Applicant $applicant
 * @property bool $follow_hiring_manager
 * @property bool $follow_applicant
 */
class Follow extends Entity
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
        'hiring_manager_id' => true,
        'applicant_id' => true,
    ];
}

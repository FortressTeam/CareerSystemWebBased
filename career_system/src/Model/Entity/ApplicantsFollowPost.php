<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicantsFollowPost Entity.
 *
 * @property int $applicant_id
 * @property \App\Model\Entity\Applicant $applicant
 * @property int $post_id
 * @property \App\Model\Entity\Post $post
 * @property bool $follow_status
 */
class ApplicantsFollowPost extends Entity
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
        'applicant_id' => true,
        'post_id' => true,
    ];
}

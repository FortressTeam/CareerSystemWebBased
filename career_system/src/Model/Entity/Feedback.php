<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Feedback Entity.
 *
 * @property int $id
 * @property string $feedback_title
 * @property string $feedback_comment
 * @property \Cake\I18n\Time $feedback_date
 * @property string $feedback_result
 * @property int $feedback_type_id
 * @property \App\Model\Entity\FeedbackType $feedback_type
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 */
class Feedback extends Entity
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

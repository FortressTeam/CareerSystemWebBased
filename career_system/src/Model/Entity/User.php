<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $user_name
 * @property string $user_password
 * @property \Cake\I18n\Time $user_registered
 * @property string $user_email
 * @property bool $user_status
 * @property string $user_activation_key
 * @property int $group_id
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Feedback[] $feedbacks
 * @property \App\Model\Entity\Notification[] $notifications
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
        'id' => false,
    ];
}

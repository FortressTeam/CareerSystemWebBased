<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity.
 *
 * @property int $id
 * @property string $notification_title
 * @property string $notification_message
 * @property int $notification_type
 * @property int $notification_object_id
 * @property \App\Model\Entity\NotificationObject $notification_object
 * @property \Cake\I18n\Time $notification_time
 * @property bool $is_seen
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 */
class Notification extends Entity
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

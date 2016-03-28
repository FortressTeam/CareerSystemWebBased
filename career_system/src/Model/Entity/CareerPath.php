<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CareerPath Entity.
 *
 * @property int $id
 * @property string $career_path_name
 * @property string $career_path_description
 * @property \App\Model\Entity\Applicant[] $applicants
 */
class CareerPath extends Entity
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

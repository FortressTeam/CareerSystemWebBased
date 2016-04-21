<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PostsHasCurriculumVitae Entity.
 *
 * @property int $post_id
 * @property \App\Model\Entity\Post $post
 * @property int $curriculum_vitae_id
 * @property \App\Model\Entity\CurriculumVitae $curriculum_vitae
 * @property int $applied_cv_status
 */
class PostsHasCurriculumVitae extends Entity
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
        'post_id' => true,
        'curriculum_vitae_id' => true,
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity.
 *
 * @property int $id
 * @property string $post_title
 * @property string $post_content
 * @property int $post_salary
 * @property string $post_location
 * @property \Cake\I18n\Time $post_date
 * @property bool $post_status
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 * @property int $hiring_manager_id
 * @property \App\Model\Entity\HiringManager $hiring_manager
 * @property \App\Model\Entity\ApplicantsFollowPost[] $applicants_follow_posts
 * @property \App\Model\Entity\PostsHasCurriculumVitae[] $posts_has_curriculum_vitaes
 */
class Post extends Entity
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

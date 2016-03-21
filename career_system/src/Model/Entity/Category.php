<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity.
 *
 * @property int $id
 * @property string $category_name
 * @property string $category_description
 * @property int $parent_id
 * @property \App\Model\Entity\Category $parent_category
 * @property int $lft
 * @property int $rght
 * @property \App\Model\Entity\Category[] $child_categories
 * @property \App\Model\Entity\Post[] $posts
 */
class Category extends Entity
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
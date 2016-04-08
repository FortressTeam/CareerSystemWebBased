<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CurriculumVitae Entity.
 *
 * @property int $id
 * @property int $applicant_id
 * @property \App\Model\Entity\Applicant $applicant
 * @property int $curriculum_vitae_template_id
 * @property \App\Model\Entity\CurriculumVitaeTemplate $curriculum_vitae_template
 * @property string $curriculum_vitae_data
 * @property \App\Model\Entity\PostsHasCurriculumVitae[] $posts_has_curriculum_vitaes
 */
class CurriculumVitae extends Entity
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

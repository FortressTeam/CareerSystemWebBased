<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Applicant Entity.
 *
 * @property int $id
 * @property string $applicant_name
 * @property string $applicant_phone_number
 * @property \Cake\I18n\Time $applicant_date_of_birth
 * @property bool $applicant_sex
 * @property string $applicant_address
 * @property string $applicant_about
 * @property bool $applicant_marital_status
 * @property string $applicant_future_goals
 * @property string $applicant_website
 * @property bool $applicant_status
 * @property int $career_path_id
 * @property \App\Model\Entity\CareerPath $career_path
 * @property \App\Model\Entity\ApplicantsFollowPost[] $applicants_follow_posts
 * @property \App\Model\Entity\ApplicantsHasHobby[] $applicants_has_hobbies
 * @property \App\Model\Entity\ApplicantsHasSkill[] $applicants_has_skills
 * @property \App\Model\Entity\AppointmentsHasApplicant[] $appointments_has_applicants
 * @property \App\Model\Entity\CurriculumVitae[] $curriculum_vitaes
 * @property \App\Model\Entity\Follow[] $follow
 * @property \App\Model\Entity\PersonalHistory[] $personal_history
 * @property \App\Model\Entity\User $user
 */
class Applicant extends Entity
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

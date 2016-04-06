<?php
namespace App\Model\Table;

use App\Model\Entity\Applicant;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Applicants Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CareerPaths
 * @property \Cake\ORM\Association\HasMany $ApplicantsFollowPosts
 * @property \Cake\ORM\Association\HasMany $ApplicantsHasHobbies
 * @property \Cake\ORM\Association\HasMany $ApplicantsHasSkills
 * @property \Cake\ORM\Association\HasMany $AppointmentsHasApplicants
 * @property \Cake\ORM\Association\HasMany $CurriculumVitaes
 * @property \Cake\ORM\Association\HasMany $Follow
 * @property \Cake\ORM\Association\HasMany $PersonalHistory
 */
class ApplicantsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('applicants');
        $this->displayField('applicant_name');
        $this->primaryKey('id');

        $this->belongsTo('CareerPaths', [
            'foreignKey' => 'career_path_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ApplicantsFollowPosts', [
            'foreignKey' => 'applicant_id'
        ]);
        $this->hasMany('ApplicantsHasHobbies', [
            'foreignKey' => 'applicant_id'
        ]);
        $this->hasMany('ApplicantsHasSkills', [
            'foreignKey' => 'applicant_id'
        ]);
        $this->hasMany('AppointmentsHasApplicants', [
            'foreignKey' => 'applicant_id'
        ]);
        $this->hasMany('CurriculumVitaes', [
            'foreignKey' => 'applicant_id'
        ]);
        $this->hasMany('Follow', [
            'foreignKey' => 'applicant_id'
        ]);
        $this->hasMany('PersonalHistory', [
            'foreignKey' => 'applicant_id'
        ]);
        $this->hasOne('Users', [
            'foreignKey' => 'id'
        ]);
        $this->belongsToMany('Skills', [
            'joinTable' => 'applicants_has_skills'
        ]);
        $this->belongsToMany('Hobbies', [
            'joinTable' => 'applicants_has_skills'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('applicant_name', 'create')
            ->notEmpty('applicant_name');

        $validator
            ->requirePresence('applicant_phone_number', 'create')
            ->notEmpty('applicant_phone_number');

        $validator
            ->date('applicant_date_of_birth')
            ->requirePresence('applicant_date_of_birth', 'create')
            ->notEmpty('applicant_date_of_birth');

        $validator
            ->boolean('applicant_sex')
            ->requirePresence('applicant_sex', 'create')
            ->notEmpty('applicant_sex');

        $validator
            ->requirePresence('applicant_address', 'create')
            ->notEmpty('applicant_address');

        $validator
            ->requirePresence('applicant_about', 'create')
            ->notEmpty('applicant_about');

        $validator
            ->boolean('applicant_marital_status')
            ->requirePresence('applicant_marital_status', 'create')
            ->notEmpty('applicant_marital_status');

        $validator
            ->requirePresence('applicant_future_goals', 'create')
            ->notEmpty('applicant_future_goals');

        $validator
            ->allowEmpty('applicant_website');

        $validator
            ->boolean('applicant_status')
            ->requirePresence('applicant_status', 'create')
            ->notEmpty('applicant_status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['career_path_id'], 'CareerPaths'));
        return $rules;
    }
}

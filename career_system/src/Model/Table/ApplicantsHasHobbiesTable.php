<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicantsHasHobby;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicantsHasHobbies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Applicants
 * @property \Cake\ORM\Association\BelongsTo $Hobbies
 */
class ApplicantsHasHobbiesTable extends Table
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

        $this->table('applicants_has_hobbies');
        $this->displayField('applicant_id');
        $this->primaryKey(['applicant_id', 'hobby_id']);

        $this->belongsTo('Applicants', [
            'foreignKey' => 'applicant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Hobbies', [
            'foreignKey' => 'hobby_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['applicant_id'], 'Applicants'));
        $rules->add($rules->existsIn(['hobby_id'], 'Hobbies'));
        return $rules;
    }
}

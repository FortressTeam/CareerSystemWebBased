<?php
namespace App\Model\Table;

use App\Model\Entity\Follow;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Follow Model
 *
 * @property \Cake\ORM\Association\BelongsTo $HiringManagers
 * @property \Cake\ORM\Association\BelongsTo $Applicants
 */
class FollowTable extends Table
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

        $this->table('follow');
        $this->displayField('hiring_manager_id');
        $this->primaryKey(['hiring_manager_id', 'applicant_id']);

        $this->belongsTo('HiringManagers', [
            'foreignKey' => 'hiring_manager_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Applicants', [
            'foreignKey' => 'applicant_id',
            'joinType' => 'INNER'
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
            ->boolean('follow_hiring_manager')
            ->allowEmpty('follow_hiring_manager');

        $validator
            ->boolean('follow_applicant')
            ->allowEmpty('follow_applicant');

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
        $rules->add($rules->existsIn(['hiring_manager_id'], 'HiringManagers'));
        $rules->add($rules->existsIn(['applicant_id'], 'Applicants'));
        return $rules;
    }
}

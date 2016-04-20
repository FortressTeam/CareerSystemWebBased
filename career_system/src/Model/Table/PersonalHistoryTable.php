<?php
namespace App\Model\Table;

use App\Model\Entity\PersonalHistory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonalHistory Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PersonalHistoryTypes
 * @property \Cake\ORM\Association\BelongsTo $Applicants
 */
class PersonalHistoryTable extends Table
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

        $this->table('personal_history');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('PersonalHistoryTypes', [
            'foreignKey' => 'personal_history_type_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('personal_history_title', 'create')
            ->notEmpty('personal_history_title');

        $validator
            ->requirePresence('personal_history_detail', 'create')
            ->notEmpty('personal_history_detail');

        $validator
            ->date('personal_history_start')
            ->requirePresence('personal_history_start', 'create')
            ->notEmpty('personal_history_start');

        $validator
            ->date('personal_history_end')
            ->allowEmpty('personal_history_end');

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
        $rules->add($rules->existsIn(['personal_history_type_id'], 'PersonalHistoryTypes'));
        $rules->add($rules->existsIn(['applicant_id'], 'Applicants'));
        return $rules;
    }
}

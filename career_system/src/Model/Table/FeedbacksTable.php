<?php
namespace App\Model\Table;

use App\Model\Entity\Feedback;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Feedbacks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $FeedbackTypes
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class FeedbacksTable extends Table
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

        $this->table('feedbacks');
        $this->displayField('feedback_title');
        $this->primaryKey('id');

        $this->belongsTo('FeedbackTypes', [
            'foreignKey' => 'feedback_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('feedback_title');

        $validator
            ->allowEmpty('feedback_comment');

        $validator
            ->date('feedback_date')
            ->allowEmpty('feedback_date');

        $validator
            ->allowEmpty('feedback_result');

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
        $rules->add($rules->existsIn(['feedback_type_id'], 'FeedbackTypes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}

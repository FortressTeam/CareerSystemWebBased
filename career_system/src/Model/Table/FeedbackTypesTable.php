<?php
namespace App\Model\Table;

use App\Model\Entity\FeedbackType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FeedbackTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Feedbacks
 */
class FeedbackTypesTable extends Table
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

        $this->table('feedback_types');
        $this->displayField('feedback_type_name');
        $this->primaryKey('id');

        $this->hasMany('Feedbacks', [
            'foreignKey' => 'feedback_type_id'
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
            ->allowEmpty('feedback_type_name');

        return $validator;
    }
}

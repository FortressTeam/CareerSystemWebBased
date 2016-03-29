<?php
namespace App\Model\Table;

use App\Model\Entity\PersonalHistoryType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonalHistoryTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $PersonalHistory
 */
class PersonalHistoryTypesTable extends Table
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

        $this->table('personal_history_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('PersonalHistory', [
            'foreignKey' => 'personal_history_type_id'
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
            ->requirePresence('personal_history_type_name', 'create')
            ->notEmpty('personal_history_type_name');

        $validator
            ->allowEmpty('personal_history_type_description');

        return $validator;
    }
}

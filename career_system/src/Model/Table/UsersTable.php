<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\HasMany $Feedbacks
 * @property \Cake\ORM\Association\HasMany $Notifications
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Feedbacks', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Notifications', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasOne('Applicants', [
            'foreignKey' => 'id'
        ]);
        $this->hasOne('HiringManagers', [
            'foreignKey' => 'id'
        ]);
        $this->hasOne('Administrators', [
            'foreignKey' => 'id'
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
            ->allowEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('user_email', 'create')
            ->notEmpty('user_email')
            ->add('user_email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('user_registered')
            ->requirePresence('user_registered', 'create')
            ->notEmpty('user_registered');

        $validator
            ->boolean('user_status')
            ->allowEmpty('user_status');

        $validator
            ->requirePresence('user_activation_key', 'create')
            ->notEmpty('user_activation_key')
            ->add('user_activation_key', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('user_avatar');

        $validator
            ->allowEmpty('user_android_token');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['user_activation_key']));
        $rules->add($rules->isUnique(['user_email']));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        return $rules;
    }
}

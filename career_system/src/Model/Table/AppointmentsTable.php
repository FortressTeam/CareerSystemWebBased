<?php
namespace App\Model\Table;

use App\Model\Entity\Appointment;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appointments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $HiringManagers
 * @property \Cake\ORM\Association\HasMany $AppointmentsHasApplicants
 */
class AppointmentsTable extends Table
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

        $this->table('appointments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('HiringManagers', [
            'foreignKey' => 'hiring_manager_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AppointmentsHasApplicants', [
            'foreignKey' => 'appointment_id'
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
            ->allowEmpty('appointment_name');

        $validator
            ->allowEmpty('appointment_description');

        $validator
            ->dateTime('appointment_start')
            ->allowEmpty('appointment_start');

        $validator
            ->dateTime('appointment_end')
            ->allowEmpty('appointment_end');

        $validator
            ->allowEmpty('appointment_address');

        $validator
            ->integer('appointment_SMS_alert')
            ->allowEmpty('appointment_SMS_alert');

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
        return $rules;
    }
}

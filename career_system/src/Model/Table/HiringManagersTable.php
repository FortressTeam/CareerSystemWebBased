<?php
namespace App\Model\Table;

use App\Model\Entity\HiringManager;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HiringManagers Model
 *
 * @property \Cake\ORM\Association\HasMany $Appointments
 * @property \Cake\ORM\Association\HasMany $Follow
 * @property \Cake\ORM\Association\HasMany $Posts
 */
class HiringManagersTable extends Table
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

        $this->table('hiring_managers');
        $this->displayField('hiring_manager_name');
        $this->primaryKey('id');

        $this->hasMany('Appointments', [
            'foreignKey' => 'hiring_manager_id'
        ]);
        $this->hasMany('Follow', [
            'foreignKey' => 'hiring_manager_id'
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'hiring_manager_id'
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
            ->requirePresence('hiring_manager_name', 'create')
            ->notEmpty('hiring_manager_name');

        $validator
            ->allowEmpty('hiring_manager_phone_number');

        $validator
            ->allowEmpty('company_name');

        $validator
            ->allowEmpty('company_address');

        $validator
            ->integer('company_size')
            ->allowEmpty('company_size');

        $validator
            ->allowEmpty('company_about');

        $validator
            ->allowEmpty('company_logo');

        return $validator;
    }
}

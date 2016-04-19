<?php
namespace App\Model\Table;

use App\Model\Entity\Administrator;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Administrators Model
 *
 * @property \Cake\ORM\Association\HasMany $Logs
 */
class AdministratorsTable extends Table
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

        $this->table('administrators');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Logs', [
            'foreignKey' => 'administrator_id'
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
            ->allowEmpty('administrator_name');

        $validator
            ->allowEmpty('administrator_phone_number');

        $validator
            ->date('administrator_date_of_birth')
            ->allowEmpty('administrator_date_of_birth');

        $validator
            ->allowEmpty('administrator_address');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\Major;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Majors Model
 *
 * @property \Cake\ORM\Association\HasMany $Applicants
 */
class MajorsTable extends Table
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

        $this->table('majors');
        $this->displayField('major_name');
        $this->primaryKey('id');

        $this->hasMany('Applicants', [
            'foreignKey' => 'major_id'
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
            ->allowEmpty('major_name');

        $validator
            ->allowEmpty('major_description');

        return $validator;
    }
}

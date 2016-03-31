<?php
namespace App\Model\Table;

use App\Model\Entity\SkillType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SkillTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Skills
 */
class SkillTypesTable extends Table
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

        $this->table('skill_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Skills', [
            'foreignKey' => 'skill_type_id'
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
            ->requirePresence('skill_type_name', 'create')
            ->notEmpty('skill_type_name');

        return $validator;
    }
}

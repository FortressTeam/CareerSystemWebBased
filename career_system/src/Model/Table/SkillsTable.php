<?php
namespace App\Model\Table;

use App\Model\Entity\Skill;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Skills Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SkillTypes
 * @property \Cake\ORM\Association\HasMany $ApplicantsHasSkills
 */
class SkillsTable extends Table
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

        $this->table('skills');
        $this->displayField('skill_name');
        $this->primaryKey('id');

        $this->addBehavior('Search.Search');

        $this->belongsTo('SkillTypes', [
            'foreignKey' => 'skill_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ApplicantsHasSkills', [
            'foreignKey' => 'skill_id'
        ]);
        $this->belongsToMany('Applicants', [
            'joinTable' => 'applicants_has_skills',
        ]);

        $this->searchManager()
            ->add('skill_type_id', 'Search.Value')
            ->add('q', 'Search.Like', [
                'before' => true,
                'after' => true,
                'field' => [
                    $this->aliasField('skill_name')
                ]
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
            ->requirePresence('skill_name', 'create')
            ->notEmpty('skill_name');

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
        $rules->add($rules->existsIn(['skill_type_id'], 'SkillTypes'));
        return $rules;
    }
}

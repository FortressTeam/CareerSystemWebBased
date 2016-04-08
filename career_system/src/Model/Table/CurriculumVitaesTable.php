<?php
namespace App\Model\Table;

use App\Model\Entity\CurriculumVitae;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CurriculumVitaes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Applicants
 * @property \Cake\ORM\Association\BelongsTo $CurriculumVitaeTemplates
 * @property \Cake\ORM\Association\HasMany $PostsHasCurriculumVitaes
 */
class CurriculumVitaesTable extends Table
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

        $this->table('curriculum_vitaes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Applicants', [
            'foreignKey' => 'applicant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CurriculumVitaeTemplates', [
            'foreignKey' => 'curriculum_vitae_template_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('PostsHasCurriculumVitaes', [
            'foreignKey' => 'curriculum_vitae_id'
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
            ->requirePresence('curriculum_vitae_data', 'create')
            ->notEmpty('curriculum_vitae_data');

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
        $rules->add($rules->existsIn(['applicant_id'], 'Applicants'));
        $rules->add($rules->existsIn(['curriculum_vitae_template_id'], 'CurriculumVitaeTemplates'));
        return $rules;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\CurriculumVitaeTemplate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CurriculumVitaeTemplates Model
 *
 * @property \Cake\ORM\Association\HasMany $CurriculumVitaes
 */
class CurriculumVitaeTemplatesTable extends Table
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

        $this->table('curriculum_vitae_templates');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('CurriculumVitaes', [
            'foreignKey' => 'curriculum_vitae_template_id'
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
            ->requirePresence('curriculum_vitae_template_name', 'create')
            ->notEmpty('curriculum_vitae_template_name');

        $validator
            ->allowEmpty('curriculum_vitae_template_image');

        $validator
            ->requirePresence('curriculum_vitae_template_url', 'create')
            ->notEmpty('curriculum_vitae_template_url');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\PostsHasCurriculumVitae;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PostsHasCurriculumVitaes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Posts
 * @property \Cake\ORM\Association\BelongsTo $CurriculumVitaes
 */
class PostsHasCurriculumVitaesTable extends Table
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

        $this->table('posts_has_curriculum_vitaes');
        $this->displayField('post_id');
        $this->primaryKey(['post_id', 'curriculum_vitae_id']);

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CurriculumVitaes', [
            'foreignKey' => 'curriculum_vitae_id',
            'joinType' => 'INNER'
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
            ->integer('applied_cv_status')
            ->requirePresence('applied_cv_status', 'create')
            ->notEmpty('applied_cv_status');

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
        $rules->add($rules->existsIn(['post_id'], 'Posts'));
        $rules->add($rules->existsIn(['curriculum_vitae_id'], 'CurriculumVitaes'));
        return $rules;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\Post;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $HiringManagers
 * @property \Cake\ORM\Association\HasMany $ApplicantsFollowPosts
 * @property \Cake\ORM\Association\HasMany $PostsHasCurriculumVitaes
 */
class PostsTable extends Table
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

        $this->table('posts');
        $this->displayField('post_title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('HiringManagers', [
            'foreignKey' => 'hiring_manager_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ApplicantsFollowPosts', [
            'foreignKey' => 'post_id'
        ]);
        $this->hasMany('PostsHasCurriculumVitaes', [
            'foreignKey' => 'post_id'
        ]);
        $this->belongsToMany('CurriculumVitaes', [
            'joinTable' => 'posts_has_curriculum_vitaes'
        ]);

        $this->searchManager()
            ->add('category_id', 'Search.Value')
            ->add('hiring_manager_id', 'Search.Value')
            ->add('q', 'Search.Like', [
                'before' => true,
                'after' => true,
                'field' => [
                    $this->aliasField('id'),
                    $this->aliasField('post_title'),
                    $this->aliasField('post_content')
                ]
            ])
            ->add('location', 'Search.Like', [
                'before' => true,
                'after' => true,
                'field' => [
                    $this->aliasField('post_location')
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
            ->requirePresence('post_title', 'create')
            ->notEmpty('post_title');

        $validator
            ->requirePresence('post_content', 'create')
            ->notEmpty('post_content');

        $validator
            ->integer('post_salary')
            ->allowEmpty('post_salary');

        $validator
            ->allowEmpty('post_location');

        $validator
            ->date('post_date')
            ->allowEmpty('post_date');

        $validator
            ->integer('post_status')
            ->allowEmpty('post_status');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['hiring_manager_id'], 'HiringManagers'));
        return $rules;
    }

    /**
     * Returns a boolean value to check if this post is owned by user.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function isOwnedBy($id, $user)
    {
        return $this->exists(['id' => $id, 'hiring_manager_id' => $user]);
    }
}

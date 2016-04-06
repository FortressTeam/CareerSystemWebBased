<?php
namespace App\Model\Table;

use App\Model\Entity\Hobby;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hobbies Model
 *
 * @property \Cake\ORM\Association\HasMany $ApplicantsHasHobbies
 */
class HobbiesTable extends Table
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

        $this->table('hobbies');
        $this->displayField('hobby_name');
        $this->primaryKey('id');

        $this->hasMany('ApplicantsHasHobbies', [
            'foreignKey' => 'hobby_id'
        ]);
        $this->belongsToMany('Applicants', [
            'joinTable' => 'applicants_has_skills'
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
            ->requirePresence('hobby_name', 'create')
            ->notEmpty('hobby_name');

        $validator
            ->allowEmpty('hobby_description');

        return $validator;
    }
}

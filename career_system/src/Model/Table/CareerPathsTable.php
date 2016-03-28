<?php
namespace App\Model\Table;

use App\Model\Entity\CareerPath;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CareerPaths Model
 *
 * @property \Cake\ORM\Association\HasMany $Applicants
 */
class CareerPathsTable extends Table
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

        $this->table('career_paths');
        $this->displayField('career_path_name');
        $this->primaryKey('id');

        $this->hasMany('Applicants', [
            'foreignKey' => 'career_path_id'
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
            ->allowEmpty('career_path_name');

        $validator
            ->allowEmpty('career_path_description');

        return $validator;
    }
}

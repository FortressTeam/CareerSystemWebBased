<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostsHasCurriculumVitaesFixture
 *
 */
class PostsHasCurriculumVitaesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'post_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'curriculum_vitae_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'applied_cv_status' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_cs_posts_has_cs_curriculum_vitaes_cs_curriculum_vitaes1_idx' => ['type' => 'index', 'columns' => ['curriculum_vitae_id'], 'length' => []],
            'fk_cs_posts_has_cs_curriculum_vitaes_cs_posts1_idx' => ['type' => 'index', 'columns' => ['post_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['post_id', 'curriculum_vitae_id'], 'length' => []],
            'fk_cs_posts_has_cs_curriculum_vitaes_cs_curriculum_vitaes1' => ['type' => 'foreign', 'columns' => ['curriculum_vitae_id'], 'references' => ['curriculum_vitaes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cs_posts_has_cs_curriculum_vitaes_cs_posts1' => ['type' => 'foreign', 'columns' => ['post_id'], 'references' => ['posts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'post_id' => 1,
            'curriculum_vitae_id' => 1,
            'applied_cv_status' => 1
        ],
    ];
}

<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CurriculumVitaesFixture
 *
 */
class CurriculumVitaesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'applicant_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'curriculum_vitae_name' => ['type' => 'string', 'length' => 512, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'curriculum_vitae_template_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'curriculum_vitae_data' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_cs_curriculum_vitaes_cs_applicants1_idx' => ['type' => 'index', 'columns' => ['applicant_id'], 'length' => []],
            'fk_cs_curriculum_vitaes_cs_curriculum_vitae_templates1_idx' => ['type' => 'index', 'columns' => ['curriculum_vitae_template_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_cs_curriculum_vitaes_cs_applicants1' => ['type' => 'foreign', 'columns' => ['applicant_id'], 'references' => ['applicants', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cs_curriculum_vitaes_cs_curriculum_vitae_templates1' => ['type' => 'foreign', 'columns' => ['curriculum_vitae_template_id'], 'references' => ['curriculum_vitae_templates', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 1,
            'applicant_id' => 1,
            'curriculum_vitae_name' => 'Lorem ipsum dolor sit amet',
            'curriculum_vitae_template_id' => 1,
            'curriculum_vitae_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}

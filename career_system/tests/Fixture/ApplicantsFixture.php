<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicantsFixture
 *
 */
class ApplicantsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'applicant_name' => ['type' => 'string', 'length' => 512, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'applicant_phone_number' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'applicant_date_of_birth' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'applicant_sex' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'applicant_address' => ['type' => 'string', 'length' => 1024, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'applicant_about' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'applicant_marital_status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'applicant_future_goals' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'applicant_website' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'applicant_status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'Status mean that application is a employee or an umemployee', 'precision' => null],
        'career_path_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_cs_applicants_cs_career_paths1_idx' => ['type' => 'index', 'columns' => ['career_path_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_cs_applicants_cs_career_paths1' => ['type' => 'foreign', 'columns' => ['career_path_id'], 'references' => ['career_paths', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cs_applicants_cs_users1' => ['type' => 'foreign', 'columns' => ['id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'applicant_name' => 'Lorem ipsum dolor sit amet',
            'applicant_phone_number' => 'Lorem ipsum dolor sit amet',
            'applicant_date_of_birth' => '2016-03-28',
            'applicant_sex' => 1,
            'applicant_address' => 'Lorem ipsum dolor sit amet',
            'applicant_about' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'applicant_marital_status' => 1,
            'applicant_future_goals' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'applicant_website' => 'Lorem ipsum dolor sit amet',
            'applicant_status' => 1,
            'career_path_id' => 1
        ],
    ];
}

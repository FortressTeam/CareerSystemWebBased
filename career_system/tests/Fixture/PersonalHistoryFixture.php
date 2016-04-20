<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonalHistoryFixture
 *
 */
class PersonalHistoryFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'personal_history';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'personal_history_title' => ['type' => 'string', 'length' => 1024, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'personal_history_detail' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'personal_history_start' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'personal_history_end' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'personal_history_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'applicant_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_cs_personal_history_cs_personal_history_types1_idx' => ['type' => 'index', 'columns' => ['personal_history_type_id'], 'length' => []],
            'fk_cs_personal_history_cs_applicants1_idx' => ['type' => 'index', 'columns' => ['applicant_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_cs_personal_history_cs_applicants1' => ['type' => 'foreign', 'columns' => ['applicant_id'], 'references' => ['applicants', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cs_personal_history_cs_personal_history_types1' => ['type' => 'foreign', 'columns' => ['personal_history_type_id'], 'references' => ['personal_history_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'personal_history_title' => 'Lorem ipsum dolor sit amet',
            'personal_history_detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'personal_history_start' => '2016-04-06',
            'personal_history_end' => '2016-04-06',
            'personal_history_type_id' => 1,
            'applicant_id' => 1
        ],
    ];
}

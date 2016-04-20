<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FollowFixture
 *
 */
class FollowFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'follow';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'hiring_manager_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'applicant_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'follow_hiring_manager' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'follow_applicant' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_cs_hiring_managers_has_cs_applicants_cs_applicants1_idx' => ['type' => 'index', 'columns' => ['applicant_id'], 'length' => []],
            'fk_cs_hiring_managers_has_cs_applicants_cs_hiring_managers1_idx' => ['type' => 'index', 'columns' => ['hiring_manager_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['hiring_manager_id', 'applicant_id'], 'length' => []],
            'fk_cs_hiring_managers_has_cs_applicants_cs_applicants1' => ['type' => 'foreign', 'columns' => ['applicant_id'], 'references' => ['applicants', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cs_hiring_managers_has_cs_applicants_cs_hiring_managers1' => ['type' => 'foreign', 'columns' => ['hiring_manager_id'], 'references' => ['hiring_managers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'hiring_manager_id' => 1,
            'applicant_id' => 1,
            'follow_hiring_manager' => 1,
            'follow_applicant' => 1
        ],
    ];
}

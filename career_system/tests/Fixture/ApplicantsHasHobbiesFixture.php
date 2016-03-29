<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicantsHasHobbiesFixture
 *
 */
class ApplicantsHasHobbiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'applicant_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hobby_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_cs_applicants_has_cs_hobbies_cs_hobbies1_idx' => ['type' => 'index', 'columns' => ['hobby_id'], 'length' => []],
            'fk_cs_applicants_has_cs_hobbies_cs_applicants1_idx' => ['type' => 'index', 'columns' => ['applicant_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['applicant_id', 'hobby_id'], 'length' => []],
            'fk_cs_applicants_has_cs_hobbies_cs_applicants1' => ['type' => 'foreign', 'columns' => ['applicant_id'], 'references' => ['applicants', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cs_applicants_has_cs_hobbies_cs_hobbies1' => ['type' => 'foreign', 'columns' => ['hobby_id'], 'references' => ['hobbies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'applicant_id' => 1,
            'hobby_id' => 1
        ],
    ];
}

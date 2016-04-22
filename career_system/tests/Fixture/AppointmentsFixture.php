<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppointmentsFixture
 *
 */
class AppointmentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'appointment_name' => ['type' => 'string', 'length' => 512, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'appointment_description' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'appointment_start' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'appointment_end' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'appointment_address' => ['type' => 'string', 'length' => 512, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'appointment_SMS_alert' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hiring_manager_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_cs_appointments_cs_hiring_managers1_idx' => ['type' => 'index', 'columns' => ['hiring_manager_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_cs_appointments_cs_hiring_managers1' => ['type' => 'foreign', 'columns' => ['hiring_manager_id'], 'references' => ['hiring_managers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'appointment_name' => 'Lorem ipsum dolor sit amet',
            'appointment_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'appointment_start' => '2016-04-22 03:15:57',
            'appointment_end' => '2016-04-22 03:15:57',
            'appointment_address' => 'Lorem ipsum dolor sit amet',
            'appointment_SMS_alert' => 1,
            'hiring_manager_id' => 1
        ],
    ];
}

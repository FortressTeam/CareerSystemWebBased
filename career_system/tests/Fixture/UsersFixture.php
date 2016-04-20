<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_email' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_registered' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_status' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'user_activation_key' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_avatar' => ['type' => 'string', 'length' => 1024, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_android_token' => ['type' => 'string', 'length' => 128, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'group_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_cs_users_cs_groups1_idx' => ['type' => 'index', 'columns' => ['group_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'user_activation_key_UNIQUE' => ['type' => 'unique', 'columns' => ['user_activation_key'], 'length' => []],
            'user_email_UNIQUE' => ['type' => 'unique', 'columns' => ['user_email'], 'length' => []],
            'fk_cs_users_cs_groups1' => ['type' => 'foreign', 'columns' => ['group_id'], 'references' => ['groups', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'username' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'user_email' => 'Lorem ipsum dolor sit amet',
            'user_registered' => '2016-04-20',
            'user_status' => 1,
            'user_activation_key' => 'Lorem ip',
            'user_avatar' => 'Lorem ipsum dolor sit amet',
            'user_android_token' => 'Lorem ipsum dolor sit amet',
            'group_id' => 1
        ],
    ];
}

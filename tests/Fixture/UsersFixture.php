<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
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
        'Id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Username' => ['type' => 'string', 'length' => 75, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Password' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Phonenumber' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Type' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => '般', 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => 'Tells us about the type of user.', 'precision' => null, 'fixed' => null],
        'Creation_Date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Tells the time stamp at which the user was created.', 'precision' => null],
        'Update_Date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Gives the timestamp at which the details were updated.', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Id'], 'length' => []],
            'Username_UNIQUE' => ['type' => 'unique', 'columns' => ['Username'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'Id' => 1,
                'Username' => 'Lorem ipsum dolor sit amet',
                'Name' => 'Lorem ipsum dolor sit amet',
                'Password' => 'Lorem ipsum dolor sit amet',
                'Phonenumber' => 'Lorem ip',
                'Type' => 'Lorem ipsum dolor sit amet',
                'Creation_Date' => '2021-12-28 01:46:40',
                'Update_Date' => '2021-12-28 01:46:40',
            ],
        ];
        parent::init();
    }
}

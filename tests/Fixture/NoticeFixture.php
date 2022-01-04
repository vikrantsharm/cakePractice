<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NoticeFixture
 */
class NoticeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'notice';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Subject' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Content' => ['type' => 'string', 'length' => 3000, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Author' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'It is the foreign key to id column of Users table.(Tells the person who created the notice.)', 'precision' => null, 'autoIncrement' => null],
        'Creation_Date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Update_Date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'IsDeleted' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => 'It is 0 if not deleted by user.', 'precision' => null],
        '_indexes' => [
            '_idx' => ['type' => 'index', 'columns' => ['Author'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'Authorid' => ['type' => 'foreign', 'columns' => ['Author'], 'references' => ['users', 'Id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 1,
                'Subject' => 'Lorem ipsum dolor sit amet',
                'Content' => 'Lorem ipsum dolor sit amet',
                'Author' => 1,
                'Creation_Date' => '2021-12-28 01:49:41',
                'Update_Date' => '2021-12-28 01:49:41',
                'IsDeleted' => 1,
            ],
        ];
        parent::init();
    }
}

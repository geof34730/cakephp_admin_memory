<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CentreculturelFixture
 *
 */
class CentreculturelFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'centreculturel';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'centreculturel_id' => ['type' => 'integer', 'length' => 16, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'centreculturel_codepostal' => ['type' => 'string', 'length' => 250, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'centreculturel_nom' => ['type' => 'string', 'length' => 250, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'centreculturel_panonceau' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'centreculturel_valuefield' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['centreculturel_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
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
            'centreculturel_id' => 1,
            'centreculturel_codepostal' => 'Lorem ipsum dolor sit amet',
            'centreculturel_nom' => 'Lorem ipsum dolor sit amet',
            'centreculturel_panonceau' => 1,
            'centreculturel_valuefield' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}

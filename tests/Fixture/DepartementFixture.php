<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartementFixture
 *
 */
class DepartementFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'departement';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'departement_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'departement_code' => ['type' => 'string', 'length' => 3, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'departement_nom' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'departement_nom_uppercase' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'departement_slug' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'departement_nom_soundex' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'departement_slug' => ['type' => 'index', 'columns' => ['departement_slug'], 'length' => []],
            'departement_code' => ['type' => 'index', 'columns' => ['departement_code'], 'length' => []],
            'departement_nom_soundex' => ['type' => 'index', 'columns' => ['departement_nom_soundex'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['departement_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'latin1_swedish_ci'
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
            'departement_id' => 1,
            'departement_code' => 'L',
            'departement_nom' => 'Lorem ipsum dolor sit amet',
            'departement_nom_uppercase' => 'Lorem ipsum dolor sit amet',
            'departement_slug' => 'Lorem ipsum dolor sit amet',
            'departement_nom_soundex' => 'Lorem ipsum dolor '
        ],
    ];
}

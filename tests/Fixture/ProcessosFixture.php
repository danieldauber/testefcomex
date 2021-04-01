<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProcessosFixture
 */
class ProcessosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'identificador' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'tipo' => ['type' => 'char', 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'pais_destino' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'valor_total' => ['type' => 'decimal', 'length' => 19, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'via_transporte' => ['type' => 'char', 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'peso_bruto' => ['type' => 'float', 'length' => 19, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'updated' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'identificador' => ['type' => 'unique', 'columns' => ['identificador'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'identificador' => 'E-123-TEST',
                'tipo' => 'E',
                'pais_destino' => 'Brasil',
                'valor_total' => 20.59,
                'via_transporte' => null,
                'peso_bruto' => null,
                'created' => '2021-04-01 20:39:31',
                'updated' => '2021-04-01 20:39:31',
            ],
            [
                'id' => 2,
                'identificador' => 'I-123-TEST',
                'tipo' => 'I',
                'pais_destino' => null,
                'valor_total' => null,
                'via_transporte' => 'M',
                'peso_bruto' => 200.00432,
                'created' => '2021-04-01 20:39:31',
                'updated' => '2021-04-01 20:39:31',
            ]
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProcessos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('processos');
        $table->addColumn('identificador', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false
        ]);
        $table->addIndex(['identificador'], [
            'unique' => true
        ]);
        $table->addColumn('tipo', 'char', [
            'default' => null,
            'limit' => 1,
            'null' => false
        ]);
        $table->addColumn('pais_destino', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true
        ]);
        $table->addColumn('valor_total', 'decimal', [
            'default' => null,
            'null' => true,
            'precision' => 19,
            'scale' => 2
        ]);
        $table->addColumn('via_transporte', 'char', [
            'default' => null,
            'limit' => 1,
            'null' => true
        ]);
        $table->addColumn('peso_bruto', 'float', [
            'default' => null,
            'null' => true,
            'precision' => 19,
            'scale' => 5
        ]);
        $table->addColumn('created', 'timestamp', [
            'null' => 'CURRENT_TIMESTAMP'
        ]);
        $table->addColumn('updated', 'timestamp', [
            'null' => 'CURRENT_TIMESTAMP'
        ]);
        $table->create();
    }
}

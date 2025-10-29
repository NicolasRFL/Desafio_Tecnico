<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class Initial extends BaseMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     *
     * @return void
     */
    public function up(): void
    {
        $this->table('muestras')
            ->addColumn('nro_precinto', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('empresa', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('especie', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('cantidad_semillas', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('fecha_creacion', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('fecha_modificacion', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('codigo_muestra', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addIndex(
                $this->index('codigo_muestra')
                    ->setName('codigo_muestra')
                    ->setType('unique')
            )
            ->addIndex(
                $this->index('especie')
                    ->setName('especie')
            )
            ->addIndex(
                $this->index('fecha_creacion')
                    ->setName('fecha_creacion')
            )
            ->create();

        $this->table('resultados', ['id' => false, 'primary_key' => ['muestra_id']])
            ->addColumn('muestra_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('poder_germinativo', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 5,
                'scale' => 2,
                'signed' => true,
            ])
            ->addColumn('pureza', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 5,
                'scale' => 2,
                'signed' => true,
            ])
            ->addColumn('materiales_inertes', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('fecha_creacion', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('fecha_modificacion', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('resultados')
            ->addForeignKey(
                $this->foreignKey('muestra_id')
                    ->setReferencedTable('muestras')
                    ->setReferencedColumns('id')
                    ->setOnDelete('CASCADE')
                    ->setOnUpdate('CASCADE')
                    ->setName('fk_resultados_muestra')
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     *
     * @return void
     */
    public function down(): void
    {
        $this->table('resultados')
            ->dropForeignKey(
                'muestra_id'
            )->save();

        $this->table('muestras')->drop()->save();
        $this->table('resultados')->drop()->save();
    }
}

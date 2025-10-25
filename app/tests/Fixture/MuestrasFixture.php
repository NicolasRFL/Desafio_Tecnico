<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MuestrasFixture
 */
class MuestrasFixture extends TestFixture
{
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
                'nro_precinto' => 'Lorem ipsum dolor sit amet',
                'empresa' => 'Lorem ipsum dolor sit amet',
                'especie' => 'Lorem ipsum dolor sit amet',
                'cantidad_semillas' => 1,
                'fecha_creacion' => '2025-10-25 00:17:30',
                'fecha_modificacion' => '2025-10-25 00:17:30',
                'codigo_muestra' => 'Lorem ipsum dolor ',
            ],
        ];
        parent::init();
    }
}

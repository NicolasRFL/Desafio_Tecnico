<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResultadosFixture
 */
class ResultadosFixture extends TestFixture
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
                'muestra_id' => 1,
                'poder_germinativo' => 1.5,
                'pureza' => 1.5,
                'materiales_inertes' => 'Lorem ipsum dolor sit amet',
                'fecha_creacion' => '2025-10-25 00:51:05',
                'fecha_modificacion' => '2025-10-25 00:51:05',
            ],
        ];
        parent::init();
    }
}

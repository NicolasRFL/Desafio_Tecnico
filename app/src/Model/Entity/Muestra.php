<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Muestra Entity
 *
 * @property int $id
 * @property string $nro_precinto
 * @property string $empresa
 * @property string $especie
 * @property int $cantidad_semillas
 * @property \Cake\I18n\DateTime|null $fecha_creacion
 * @property \Cake\I18n\DateTime|null $fecha_modificacion
 * @property string $codigo_muestra
 *
 * @property \App\Model\Entity\Resultado[] $resultados
 */
class Muestra extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nro_precinto' => true,
        'empresa' => true,
        'especie' => true,
        'cantidad_semillas' => true,
        'fecha_creacion' => true,
        'fecha_modificacion' => true,
        'codigo_muestra' => true,
        'resultados' => true,
    ];
}

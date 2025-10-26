<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muestra $muestra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Muestra'), ['action' => 'edit', $muestra->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Muestra'), ['action' => 'delete', $muestra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $muestra->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Muestras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Muestra'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="muestras view content">
            <h3><?= h($muestra->nro_precinto) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nro Precinto') ?></th>
                    <td><?= h($muestra->nro_precinto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Empresa') ?></th>
                    <td><?= h($muestra->empresa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Especie') ?></th>
                    <td><?= h($muestra->especie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo Muestra') ?></th>
                    <td><?= h($muestra->codigo_muestra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($muestra->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad Semillas') ?></th>
                    <td><?= $this->Number->format($muestra->cantidad_semillas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Creacion') ?></th>
                    <td><?= h($muestra->fecha_creacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Modificacion') ?></th>
                    <td><?= h($muestra->fecha_modificacion) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Resultados') ?></h4>
                <?php if (!empty($muestra->resultados)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Muestra Id') ?></th>
                            <th><?= __('Poder Germinativo') ?></th>
                            <th><?= __('Pureza') ?></th>
                            <th><?= __('Materiales Inertes') ?></th>
                            <th><?= __('Fecha Creacion') ?></th>
                            <th><?= __('Fecha Modificacion') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($muestra->resultados as $resultado) : ?>
                        <tr>
                            <td><?= h($resultado->id) ?></td>
                            <td><?= h($resultado->muestra_id) ?></td>
                            <td><?= h($resultado->poder_germinativo) ?></td>
                            <td><?= h($resultado->pureza) ?></td>
                            <td><?= h($resultado->materiales_inertes) ?></td>
                            <td><?= h($resultado->fecha_creacion) ?></td>
                            <td><?= h($resultado->fecha_modificacion) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Resultados', 'action' => 'view', $resultado->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Resultados', 'action' => 'edit', $resultado->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Resultados', 'action' => 'delete', $resultado->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $resultado->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
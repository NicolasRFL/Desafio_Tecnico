<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Resultado> $resultados
 */
?>
<div class="resultados index content">
    <?= $this->Html->link(__('Nuevo Resultado'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Resultados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('muestra_id') ?></th>
                    <th><?= $this->Paginator->sort('poder_germinativo') ?></th>
                    <th><?= $this->Paginator->sort('pureza') ?></th>
                    <th><?= $this->Paginator->sort('materiales_inertes') ?></th>
                    <th><?= $this->Paginator->sort('fecha_creacion') ?></th>
                    <th><?= $this->Paginator->sort('fecha_modificacion') ?></th>
                    <th class="actions"><?= __('Ver') ?></th>
                    <th class="actions"><?= __('Editar') ?></th>
                    <th class="actions"><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $resultado): ?>
                <tr>
                    <td><?= $resultado->hasValue('muestra') ? $this->Html->link($resultado->muestra->nro_precinto, ['controller' => 'Muestras', 'action' => 'view', $resultado->muestra->id]) : '' ?></td>
                    <td><?= $this->Number->format($resultado->poder_germinativo) ?></td>
                    <td><?= $this->Number->format($resultado->pureza) ?></td>
                    <td><?= h($resultado->materiales_inertes) ?></td>
                    <td><?= h($resultado->fecha_creacion->format('d/m/Y') ) ?></td>
                    <td><?= h($resultado->fecha_modificacion->format('d/m/Y') ) ?></td>
                    <td>
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $resultado->muestra_id], ['class' => 'button']) ?>
                    </td>
                    <td>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $resultado->muestra_id], ['class' => 'button']) ?>
                    </td>
                    <td>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $resultado->muestra_id],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Está seguro de que desea eliminar el resultado con el ID # {0}?', $resultado->muestra_id),
                                'class' => 'button'
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>
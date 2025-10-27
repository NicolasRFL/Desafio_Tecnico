<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Muestra> $muestras
 */
?>
<div class="muestras index content">
    <?= $this->Html->link(__('Nueva Muestra'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Muestras') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nro_precinto') ?></th>
                    <th><?= $this->Paginator->sort('empresa') ?></th>
                    <th><?= $this->Paginator->sort('especie') ?></th>
                    <th><?= $this->Paginator->sort('cantidad_semillas') ?></th>
                    <th><?= $this->Paginator->sort('codigo_muestra') ?></th>
                    <th class="actions"><?= __('Ver detalles') ?></th>
                    <th class="actions"><?= __('Editar') ?></th>
                    <th class="actions"><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($muestras as $muestra): ?>
                <tr>
                    <td><?= h($muestra->nro_precinto) ?></td>
                    <td><?= h($muestra->empresa) ?></td>
                    <td><?= h($muestra->especie) ?></td>
                    <td><?= $this->Number->format($muestra->cantidad_semillas) ?></td>
                    <td><?= h($muestra->codigo_muestra) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver detalles'), ['action' => 'view', $muestra->id]) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $muestra->id]) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $muestra->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Está seguro de que desea eliminar # {0}?', $muestra->id),
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
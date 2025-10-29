<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resultado $resultado
 * @var string[]|\Cake\Collection\CollectionInterface $muestras
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resultado->muestra_id],
                ['confirm' => __('¿Estas seguro de que deseas eliminar este resultado?', $resultado->muestra_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="resultados form content">
            <?= $this->Form->create($resultado) ?>
            <fieldset>
                <legend><?= __('Edit Resultado') ?></legend>
                <?php
                    echo $this->Form->control('poder_germinativo');
                    echo $this->Form->control('pureza');
                    echo $this->Form->control('materiales_inertes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

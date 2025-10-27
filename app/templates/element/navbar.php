<?php
$current = strtolower($this->request->getParam('controller'));
?>
<?= $this->Html->css('navbar') ?>
<nav class="nav">
    <a class="brand" href="<?= $this->Url->build('/') ?>">INASE</a>
    <div class="links">
        <?= $this->Html->link(
            'Muestras',
            ['controller' => 'Muestras', 'action' => 'index'],
            ['class' => $current === 'muestras' ? 'active' : '']
        ) ?>
        <?= $this->Html->link(
            'Resultados',
            ['controller' => 'Resultados', 'action' => 'index'],
            ['class' => $current === 'resultados' ? 'active' : '']
        ) ?>
        <?= $this->Html->link(
            'Reportes',
            ['controller' => 'Reportes', 'action' => 'index'],
            ['class' => $current === 'reportes' ? 'active' : '']
        ) ?>
    </div>
</nav>
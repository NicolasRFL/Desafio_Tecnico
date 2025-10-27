<?php
?>
<h1>Reporte de Muestras</h1>

<form method="get">
    <label>Especie:</label>
    <input type="text" name="especie" value="<?= h($this->request->getQuery('especie')) ?>">
    <label>Desde:</label>
    <input type="date" name="desde">
    <label>Hasta:</label>
    <input type="date" name="hasta">
    <button type="submit">Filtrar</button>
</form>

<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Empresa</th>
            <th>Especie</th>
            <th>Poder germinativo</th>
            <th>Pureza</th>
            <th>Materiales inertes</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($muestras as $muestra): ?>
            <?php foreach ($muestra->resultados as $resultado): ?>
            <tr>
                <td><?= h($muestra->codigo_muestra) ?></td>
                <td><?= h($muestra->empresa) ?></td>
                <td><?= h($muestra->especie) ?></td>
                <td><?= h($resultado->poder_germinativo) ?>%</td>
                <td><?= h($resultado->pureza) ?>%</td>
                <td><?= h($resultado->materiales_inertes) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
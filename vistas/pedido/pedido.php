<h1 class="page-header">Pedidos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Pedido&a=Crud">Nuevo pedido</a>
</div>
<div>
    <a href="fpdf/Pedidos.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i> Generar reportes</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id</th>
            <th>Fecha Pedido</th>
            <th>Hora Pedido</th>
            <th>Total Pedido</th>
            <th>Estado Pedido</th>
            <th>Pedido a Domicilio</th>
            <th>Id Usuario</th>
            <th>Id Producto</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->Listar() as $p): ?>
            <tr>
                <td><?php echo $p->idpedido; ?></td>
                <td><?php echo $p->fechapedido; ?></td>
                <td><?php echo $p->horapedido; ?></td>
                <td><?php echo $p->totalpedido; ?></td>
                <td><?php echo $p->estadopedido; ?></td>
                <td><?php echo $p->pedidoadomicilio; ?></td>
                <td><?php echo $p->idusuarioFK; ?></td>
                <td><?php echo $p->idProductoFK; ?></td>
                <td>
                    <a href="?c=Pedido&a=Crud&idpedido=<?php echo $p->idpedido; ?>">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Pedido&a=Eliminar&idpedido=<?php echo $p->idpedido; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1 class="page-header">Domicilios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Domicilio&a=Crud">Nuevo domicilio</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Id Pedido</th>
            <th>Id Domicilio</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $d): ?>
        <tr>
            <td><?php echo $d->idDomicilio; ?></td>
            <td><?php echo $d->horaDomicilio; ?></td>
            <td><?php echo $d->estadoDomicilio; ?></td>
            <td><?php echo $d->idpedidoFK; ?></td>
            <td><?php echo $d->idDomicilioFK; ?></td>
            <td>
                <a href="?c=Domicilio&a=Crud&idDomicilio=<?php echo $d->idDomicilio; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Domicilio&a=Eliminar&idDomicilio=<?php echo $d->idDomicilio; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

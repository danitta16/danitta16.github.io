<h1 class="page-header">Productos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Producto&a=Crud">Nuevo producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $p): ?>
        <tr>
            <td><?php echo $p->idproducto; ?></td>
            <td><?php echo $p->descripProducto; ?></td>
            <td><?php echo $p->precioproducto; ?></td>
            <td><?php echo $p->categoriaproducto; ?></td>
            <td><?php echo $p->estadoproducto; ?></td>
            <td>
                <a href="?c=Producto&a=Crud&idproducto=<?php echo $p->idproducto; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Producto&a=Eliminar&idproducto=<?php echo $p->idproducto; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

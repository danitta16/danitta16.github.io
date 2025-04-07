<h1 class="page-header">Roles</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Rol&a=Crud">Nuevo rol</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->idRolusuario; ?></td>
            <td><?php echo $r->descripRolusuario; ?></td>
            <td><?php echo $r->estadoRolusuario; ?></td>
            <td>
                <a href="?c=Rol&a=Crud&idRolusuario=<?php echo $r->idRolusuario; ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<h1 class="page-header">Usuarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Usuario&a=Crud">Nuevo usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Número de Documento</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th>ID Rol</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $u): ?>
        <tr>
            <td><?php echo $u->id_usuario; ?></td>
            <td><?php echo $u->nombre_usuario; ?></td>
            <td><?php echo $u->apellido_usuario; ?></td>
            <td><?php echo $u->no_DocUsuario; ?></td>
            <td><?php echo $u->correo_usuario; ?></td>
            <td><?php echo $u->telefono_Usuario; ?></td>
            <td><?php echo $u->direccion_usuario; ?></td>
            <td><?php echo $u->estado_usuario; ?></td>
            <td><?php echo $u->idRolusuarioFK; ?></td>
            <td>
                <a href="?c=Usuario&a=Crud&id_usuario=<?php echo $u->id_usuario; ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
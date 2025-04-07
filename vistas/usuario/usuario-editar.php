<!-- usuario-editar.php -->

<h1 class="page-header">
    <?php echo !empty($alm->id_usuario) ? $alm->nombre_usuario : 'Nuevo Usuario'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Usuario">Usuarios</a></li>
    <li class="active"><?php echo !empty($alm->id_usuario) ? $alm->nombre_usuario : 'Nuevo Usuario'; ?></li>
</ol>

<form id="frm-usuario" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $alm->id_usuario; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre_usuario" value="<?php echo $alm->nombre_usuario; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="apellido_usuario" value="<?php echo $alm->apellido_usuario; ?>" class="form-control" placeholder="Ingrese el apellido" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Número de Documento</label>
        <input type="text" name="no_DocUsuario" value="<?php echo $alm->no_DocUsuario; ?>" class="form-control" placeholder="Ingrese el número de documento" />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="email" name="correo_Usuario" value="<?php echo $alm->correo_Usuario; ?>" class="form-control" placeholder="Ingrese el correo" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono_Usuario" value="<?php echo $alm->telefono_Usuario; ?>" class="form-control" placeholder="Ingrese el teléfono" />
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion_usuario" value="<?php echo $alm->direccion_usuario; ?>" class="form-control" placeholder="Ingrese la dirección" />
    </div>

    <div class="form-group">
        <label>Contraseña</label>
        <input type="password" name="password_usuario" value="<?php echo $alm->password_usuario; ?>" class="form-control" placeholder="Ingrese la contraseña" />
    </div>

    <div class="form-group">
    <label>Rol</label>
    <select name="idRolusuarioFK" class="form-control">
        <option value="1" <?php echo $alm->idRolusuarioFK == 1 ? 'selected' : ''; ?>>Administrador</option>
        <option value="2" <?php echo $alm->idRolusuarioFK == 2 ? 'selected' : ''; ?>>Usuario</option>
    </select>
    </div>

    <!-- Agrega más campos según sea necesario -->

    <div class="form-group">
        <label>Estado</label>
        <select name="estado_usuario" class="form-control">
            <option value="Activo" <?php echo $alm->estado_usuario === 'Activo' ? 'selected' : ''; ?>>Activo</option>
            <option value="Inactivo" <?php echo $alm->estado_usuario === 'Inactivo' ? 'selected' : ''; ?>>Inactivo</option>
        </select>
    </div>

    <hr />

    <div class="text-right">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    });
</script>

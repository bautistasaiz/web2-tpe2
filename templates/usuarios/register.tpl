{include file='templates/usogeneral/header.tpl'}

<h2 class="h2iniciarSesion">{$titulo}</h2>
<div class="containerUser">
<div class="col-md-4">
    <div class="form-group">
            <form class="my-4" action="insertRegister" method="POST" enctype="multipart/form-data">
                <input placeholder="Nombre" type="text" name="nombre" id="nombre" class="form-control" required><br>
                <input placeholder="Apellido" type="text" name="apellido" id="apellido" class="form-control" required><br>
                <input placeholder="Nombre de usuario" type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" required><br>
                <input placeholder="Correo electronico" type="text" name="email" id="email" class="form-control" required><br>
                <input placeholder="Contraseña" type="password" name="password" id="password" class="form-control" required><br><br>
                <input type="submit" class="btn btn-primary submitRegister" value="Crear cuenta">
            </form>
        </div>
    </div>

</div>



{include file='templates/usogeneral/footer.tpl'}
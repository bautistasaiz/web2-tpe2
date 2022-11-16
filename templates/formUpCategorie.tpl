{include file='templates/usogeneral/header.tpl'}
<form action="updateCategorieById" method="POST" class="my-4">
    <div class="agregar-db">
        <div class="col-9">
        <h3>Complete para modificar la categoria seleccionado</h3>
            <div class="form-group">
                <label>Id: </label>
                <input name="id_categoria" type="number" class="form-control" value="{$id}" readonly>
            </div>
            <div class="form-group">
                <label>Nombre de la categoria:</label>
                <input name="nombre_categoria" type="text" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
    </div>

</form>
{include file='templates/usogeneral/footer.tpl'}
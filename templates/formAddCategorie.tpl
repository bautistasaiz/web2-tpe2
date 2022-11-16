{include file='templates/usogeneral/header.tpl'}
<form action="agregarCategoria" method="POST" class="my-4">
    <div class="agregar-db">
        <div class="col-9">
        <h3>Complete para modificar la categoria seleccionado</h3>

            <div class="form-group">
                <label>Nombre de la nueva categoria:</label>
                <input name="newCategorie" type="text" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Añadir</button>
        </div>
    </div>
</form>
{include file='templates/usogeneral/footer.tpl'}
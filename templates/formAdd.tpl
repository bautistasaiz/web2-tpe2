{include file='templates/usogeneral/header.tpl'}
<form action="add" method="POST" class="my-4">
    <div class="agregar-db">
        <div class="col-9">
            <div class="form-group">
                <label>Nombre del modelo:</label>
                <input name="nombre" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Precio: </label>
                <input name="precio" type="number" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Marca: </label>
            <input name="marca" type="text" class="form-control" required>
        </div>
        </div>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="descripcion" class="form-control" rows="5" required></textarea>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Categoria</label>
                <select name="categorias" class="form-control" required>
                {foreach from = $categorias item=$categoria} 
                    <option value="{$categoria->id_categoria_pk}">{$categoria->nombre}</option>
                {/foreach}
                </select>
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </div>
            </div>
    </div>

</form>
{include file='templates/usogeneral/footer.tpl'}
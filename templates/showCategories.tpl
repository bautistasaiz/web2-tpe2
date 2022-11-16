{include file='templates/usogeneral/header.tpl'}

<ul class="list-group">
    {foreach from=$categorias item=$categoria}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b>{$categoria->id_categoria_pk} - {$categoria->nombre} </b> -  </span>
            <a href="filtrar/{$categoria->id_categoria_pk}">Ver detalle</a>
            {if isset($smarty.session.USER_ID)}
                <div class="ml-auto">
                <a href='updateCategorie/{$categoria->id_categoria_pk}' type='button' class='btn btn-success'>Editar</a>
                <a href='deleteCategorie/{$categoria->id_categoria_pk}' type='button' class='btn btn-danger'>Borrar</a>
            </div>
            {/if}
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} Categorias</small></p>

{include file='templates/usogeneral/footer.tpl'}
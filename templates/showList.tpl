{include file='templates/usogeneral/header.tpl'}

<ul class="list-group">
    {foreach from=$listAll item=$zapatilla}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b>{$zapatilla->nombre}</b> - {$zapatilla->descripcion|truncate:40} (precio: ${$zapatilla->precio}) - {$zapatilla->marca} -   </span>
            <a href="showItemById/{$zapatilla->id}">Ver detalle</a>
            {if isset($smarty.session.USER_ID)}
            <div class="ml-auto">
            
                <a href='update/{$zapatilla->id}' type='button' class='btn btn-success'>Editar</a>
                <a href='delete/{$zapatilla->id}' type='button' class='btn btn-danger'>Borrar</a>
            </div>
            {/if}
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} zapatillas</small></p>

{include file='templates/usogeneral/footer.tpl'}
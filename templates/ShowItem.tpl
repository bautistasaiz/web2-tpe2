{include file='templates/usogeneral/header.tpl'}

<div class="container">

    <div>
        <h2>{$shoe->nombre}</h2>
    </div>
        <p>{$shoe->descripcion}</p>
    <div>
    </div>
        <p>Precio: ${$shoe->precio}</p>
    <div>
    </div>
        <p>{$shoe->marca}</p>
    </div>
    {if isset($smarty.session.USER_ID)}
        <div class="ml-auto">
            <a href='update/{$shoe->id}' type='button' class='btn btn-success'>Editar</a>
            <a href='delete/{$shoe->id}' type='button' class='btn btn-danger'>Borrar</a>
        </div>
    {/if}
</div>

{include file='templates/usogeneral/footer.tpl'}
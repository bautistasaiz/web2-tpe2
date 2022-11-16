{include file='templates/usogeneral/header.tpl'}

<div class="container">
    
    {foreach from=$categoria item=$c}
        <h1>Categoria: </h1>
        <div>
            <h2>Nombre: {$c->nombre}</h2>
        </div>
        <div>
            <p>Precio: {$c->precio}</p>
        </div>
        <div>
        <p>Descripcion: {$c->descripcion}</p>
        </div>
        <div>
        <p>Marca: {$c->marca}</p>
        </div>

    {/foreach}
</div>

{include file='templates/usogeneral/footer.tpl'}
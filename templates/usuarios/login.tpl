{include file='templates/usogeneral/header.tpl'}
<h1>Tpe- web2</h1>

<div class="col-9">
    <div class="form-group">
        <form class="my-4" action="verify" method="POST">
            <label for="email">Email</label>
            <input name="email" type="text" id="email" class="form-control" required>
            <label for="password">Password</label>
            <input name="password" type="password" id="password" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-2">Log in</button>
        </form><br>
        <p class="noCuenta">No tienes cuenta? Click para registrarte</p>
        <span><a href="register" class="link-register">AQUÍ</a></span>
        </div>
</div>
<h4 class="login-error">{$error}</h4><br>
{include file='templates/usogeneral/footer.tpl'}
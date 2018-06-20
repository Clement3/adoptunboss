<h1>Login</h1>

<form method="POST" action="<?= $helper->base_url('login') ?>">
    <div class="field">
        <label class="label">E-mail</label>
        <div class="control">
            <input class="input" type="email" name="email" placeholder="Text input">
        </div>
    </div>
    <div class="field">
        <label class="label">Mot de passe</label>
        <div class="control">
            <input class="input" type="password" name="password" placeholder="Text input">
        </div>
    </div>
    <button type="submit" class="button is-primary">Se connecter</button>    
</form>


<form class="form-signin" method="post" action="../public/index.php?route=connect">


    <img class="mb-4" src="yohann_logo" alt="" width="72" height="72">

    <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>

    <label for="inputEmail" class="sr-only">Email address</label>

    <input name="mail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>

    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block"
            type="submit"
            name="submit"
            value="Envoyer">

        Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>

<!-- Ancien form
<div align="center">
    <h1>Accès aux panneau de configuration
        <form action="index.php?action=admin" method="POST">
            Identifiant:
            <input type="text" name="login" size="20" /> <br/>
            Mot de passe:
            <input type="password" name="password" size="20" /> <br/>
            <input type="submit" name="EnvValeur" value="Envoyer"/>
        </form>
    </h1>
</div>
-->


<form class="form-signin" method="post" action="../public/index.php?route=registration">


    <img class="mb-4" src="yohann_logo" alt="" width="72" height="72">

    <h1 class="h3 mb-3 font-weight-normal">Veuillez vous Inscrire</h1>

    <label for="inputfirstname" class="sr-only">Nom</label>
    <input name="firstName" type="text" id="inputEmail" class="form-control" placeholder="Nom" required autofocus>

    <label for="inputlastname" class="sr-only">Prénom</label>
    <input name="lastName" type="text" id="inputEmail" class="form-control" placeholder="Prénom" required autofocus>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>


    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>


    <button class="btn btn-lg btn-primary btn-block"
            type="submit"
            name="submit"
            value="Envoyer">

        Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
</form>
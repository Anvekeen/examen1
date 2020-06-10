<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/examen1/portal">ImmoVM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarMenu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="/examen1/portal">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="/examen1/building">Immeubles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="/examen1/ticket">Ticket/Communication</a>
                    </li>
                </ul>
            </div>
    <div class="mx-auto order-0">
        <span class="navbar-brand mx-auto"> Bienvenue, <?= $user->__get('username')?> </span>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-item nav-link" href="/examen1/index/disconnect">Déconnexion</a>
            </li>
        </ul>
        </div>
    </nav>

</header>

<main>
    <div class="container p-3">
<!-- <header>
    <div class="nav_gauche">
        <a href="home"><img src="assets/images/ico/logo_blanc.ico" alt="Logo CreativeHub"></a>
    </div>
    <div class="nav_droite">
        <div class="nav_rechercher">
            <input class="search-input" type="text" placeholder="Rechercher...">
            <i class="bi bi-search"></i>
        </div>
        <nav>
            <ul>
                <span>|</span>
                @if (Auth::check())
                <a href="profil"><img src="assets/images/png/enzo.png" alt="Enzo"><p>{{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }}</p></a>
                @else
                <li><a href="connexion"><i class="bi bi-person-circle"></i></a></li>
                @endif
            </ul>
        </nav>
    </div>
</header> -->

<header class="shadow-md">
    <div class="logo">
        <a href="home" title="Revenir à la page d'accueil"><img src="assets/images/ico/logo_blanc.ico" alt="Logo CreativeHub"></a>
    </div>
    <nav>
        <ul>
            <li><a href="#">Portfolio</a></li>
        </ul>
    </nav>
    <div class="search">
        <form action="#" method="get">
            <input type="text" name="search" placeholder="Rechercher...">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <div class="user">
        @if(Auth::check())
        <span class="separateur">|</span>
        <a href="profil" title="Accéder à votre compte"><img src="assets/images/png/{{ Auth::user()->img_user }}" alt="Photo {{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }}"></a>
        <span>{{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }}</span>
        @else
        <span class="separateur">|</span>
        <a href="connexion" title="Se connecter à son compte"><i class="bi bi-person-circle"></i></a>
        @endif
    </div>
</header>
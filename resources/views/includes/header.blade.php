<header>
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
</header>
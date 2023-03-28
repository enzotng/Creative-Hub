<header class="shadow-md header">
    <div class="logo">
        <a href="home" title="Revenir à la page d'accueil"><img src="assets/images/ico/logo_blanc.ico"
                alt="Logo CreativeHub"></a>
    </div>
    <nav>
        <ul>
            <span class="separateur">|</span>
            <li><a href="portfolio">Portfolio MMI</a></li>
            <li><a href="contact">Contact</a></li>
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
        <div class="toggle-switch">
            <label class="switch-label">
                <input type="checkbox" class="checkbox">
                <span class="slider"></span>
            </label>
        </div>
        <div class="dropdown">
            <img src="assets/images/png/{{ Auth::user()->img_user }}"
                alt="Photo {{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }}">
            <div class="dropdown-menu">
                <ul>
                    <span>{{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }}</span>
                    <hr>
                    <li><a href="profil"><i class="bi bi-person-circle"></i>Profil</a></li>
                    <li><a href="etudiant"><i class="bi bi-card-text"></i>Projets</a></li>
                    <hr>
                    <li><a href="deconnexion"><i class="bi bi-box-arrow-right"></i>Déconnexion</a></li>
                </ul>
            </div>
        </div>
        <!-- <span>{{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }}</span> -->
        @else
        <span class="separateur">|</span>
        <div class="toggle-switch">
            <label class="switch-label">
                <input type="checkbox" class="checkbox">
                <span class="slider"></span>
            </label>
        </div>
        <a href="connexion" title="Se connecter à son compte"><i class="bi bi-person-circle"></i></a>
        @endif
    </div>
</header>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <header>
        <a href="home"><img src="assets/images/ico/logo_blanc.ico" alt="Logo CreativeHub"></a>
        <nav>
            <ul>
                <li><a href="#"><i class="bi bi-search"></i></a></li>
                <span>|</span>
                @if (Auth::check())
                <li><a href="profil"><i class="bi bi-person-circle"></i></a></li>
                @else
                <li><a href="connexion"><i class="bi bi-person-circle"></i></a></li>
                @endif
            </ul>
        </nav>
        <div class="search-overlay">
            <form action="#" method="get">
                <input type="text" name="search" placeholder="Recherche...">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </header>

    <main id="portfolio">

        <section class="portfolioSection">
            <div class="headerPortfolio">

                @if (Auth::check())
                <h1>Bonjour, {{ Auth::user()->prenom_user }} {{ Auth::user()->nom_user }} !</h1>
                <form action="{{ route('deconnexion') }}" method="POST">
                    @csrf
                    <button class="boutonGeneral" type="submit">Déconnexion</button>
                </form>
                @else
                <h1>Travaux MMI</h1>
                <a href="{{ route('connexion') }}" class="boutonGeneral">Se connecter</a>
                @endif
            </div>

            <hr>

            <div class="gridTravaux">
                <div class="travaux">
                    <img src="./assets/images/jpg/pexels-fauxels-3183153.jpg" alt="Image Travaux">
                    <p>
                        <i class="bi bi-youtube"></i>SAE 301 : 3
                    </p>
                </div>
                <div class="travaux">
                    <img src="./assets/images/jpg/pexels-fauxels-3183153.jpg" alt="Image Travaux">
                    <p>
                        <i class="bi bi-youtube"></i>SAE 301 : Darknet
                    </p>
                </div>
                <div class="travaux">
                    <img src="./assets/images/jpg/pexels-fauxels-3183153.jpg" alt="Image Travaux">
                    <p>
                        <i class="bi bi-youtube"></i>SAE 301 : Darknet
                    </p>
                </div>
                <div class="travaux">
                    <img src="./assets/images/jpg/pexels-fauxels-3183153.jpg" alt="Image Travaux">
                    <p>
                        <i class="bi bi-youtube"></i>SAE 301 : Darknet
                    </p>
                </div>
                <div class="travaux">
                    <img src="./assets/images/jpg/pexels-fauxels-3183153.jpg" alt="Image Travaux">
                    <p>
                        <i class="bi bi-youtube"></i>SAE 301 : Darknet
                    </p>
                </div>
                <div class="travaux">
                    <img src="./assets/images/jpg/pexels-fauxels-3183153.jpg" alt="Image Travaux">
                    <p>
                        <i class="bi bi-youtube"></i>SAE 301 : Darknet
                    </p>
                </div>
                <div class="travaux">
                    <img src="./assets/images/jpg/pexels-fauxels-3183153.jpg" alt="Image Travaux">
                    <p>
                        <i class="bi bi-youtube"></i>SAE 301 : Darknet
                    </p>
                </div>
                <div class="travaux">
                    <img src="./assets/images/jpg/pexels-fauxels-3183153.jpg" alt="Image Travaux">
                    <p>
                        <i class="bi bi-youtube"></i>SAE 301 : Darknet
                    </p>
                </div>
            </div>
            <div id="pagination-container"></div>
        </section>

        <aside class="etudiantAside">
            <h1>Vos compétences</h1>
            <hr>

            <label for="nomDomaine">Choisissez votre domaine</label>
            <div class="select">
                <select name="domaine" id="domaine">
                    <option value="default">Tous les projets</option>
                    <option value="web">Web</option>
                    <option value="communication">Communication</option>
                    <option value="graphisme">Graphisme</option>
                    <option value="audiovisuel">Audiovisuel</option>
                </select>
            </div>

            <label for="nomProgress">Votre progression</label>

            <!-- <p>Développement web</p>
            <div class="boxProgression">
                <div class="skills html">
                    <span>90%</span>
                </div>
            </div>

            <p>Graphisme</p>
            <div class="boxProgression">
                <div class="skills css">
                    <span>80%</span>
                </div>
            </div>

            <p>Communication</p>
            <div class="boxProgression">
                <div class="skills js">
                    <span>65%</span>
                </div>
            </div>

            <p>Audiovisuel</p>
            <div class="boxProgression">
                <div class="skills php">
                    <span>60%</span>
                </div>
            </div> -->

            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

        </aside>
    </main>
    <footer>
        <div class="reseaux_sociaux">
            <i class="bi bi-linkedin"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-facebook"></i>
        </div>
        <p>© 2023 Creative Hub</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
    <script src="./assets/js/etudiant.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>
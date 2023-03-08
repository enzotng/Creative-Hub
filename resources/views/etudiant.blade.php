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
        <p>Creative Hub</p>
        <nav>
            <ul>
                <li><a href=""><i class="bi bi-search"></i></a></li>
                <span>|</span>
                <li><a href="connexion"><i class="bi bi-person-circle"></i></a></li>
            </ul>
        </nav>
    </header>

    <main class="etudiantMain">
        <section class="etudiantSection">
            <h1>Vos travaux</h1>
            <hr>

            <div class="gridTravaux">
                <div class="travaux1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="travaux1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="travaux1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="travaux1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="travaux1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="travaux1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="travaux1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="travaux1">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
            </div>
        </section>

        <aside class="etudiantAside">
            <h1>Vos compétences</h1>
            <hr>

            <label for="nomDomaine">Choisissez votre domaine</label>

            <select name="domaine" id="domaine">
                <option value="default">Tous les projets</option>
                <option value="web">Web</option>
                <option value="communication">Communication</option>
                <option value="graphisme">Graphisme</option>
                <option value="audiovisuel">Audiovisuel</option>
            </select>

            <label for="nomProgress">Votre progression</label>

            <p>Développement web</p>
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
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>
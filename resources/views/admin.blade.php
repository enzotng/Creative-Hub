<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Plateforme en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    @include('includes.header')

    <main id="mainAdmin">

        <section class="adminSection shadow-md">
            <h1>Admin Dashboard</h1>
            <div class="headerSection mb-4">
                <nav>
                    <ul>
                        <li>Utilisateurs</li>
                        <li>Projets</li>
                        <li>Commentaires</li>
                        <li>Paramètres du site</li>
                    </ul>
                </nav>
            </div>

            <section class="filterBar">
                <div class="search-ui">
                    <label for="search">Search</label>
                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search by user name or email address..." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="filter-ui">
                    <label for="filters">Show me</label>
                    <div class="styled-select">
                        <select name="accountStatus" id="filters">
                            <option value="active">Everyone</option>
                            <optgroup label="Audience">
                                <option value="commenters">Commenters</option>
                            </optgroup>
                            <optgroup label="Organization">
                                <option value="admins">Admins</option>
                                <option value="moderators">Moderators</option>
                                <option value="banned">Staff</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </section>

            <table>
                <tr class="table-header">
                    <th class="statusHead">Id Utilisateur</th>
                    <th>Nom</th>
                    <th>Adresse email</th>
                    <th>Mot de passe</th>
                    <th>Date de création</th>
                    <th class="roleHead">Rôle</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id_user }}</td>
                    <td class="username">{{ $user->nom_user }} {{ $user->prenom_user }}</td>
                    <td class="email"><a href="mailto:email@email.com">coffee@mail.com</a></td>
                    <td>{{ $user->mdp_user }}</td>
                    <td class="commenter">{{ $user->created_at }}<i class="fas fa-angle-down"></i></td>
                    <td class="activeUser">{{ $user->role_user }}<i class="fas fa-angle-down"></i></td>
                </tr>
                @endforeach
            </table>

            <!-- <h1 class="mb-4">Projet :</h1>
            <form action="" enctype="multipart/form-data" class="form420">
                <label for="projet_id" class="mr-2">Sélectionnez un projet :</label>
                <div class="select mr-4">
                    <select name="projet_id" id="projet_id">
                        <option value="default">-- Sélectionnez --</option>
                        @foreach ($projets as $projet)
                        <option value="{{ $projet->id_projet }}">{{ $projet->titre_projet }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </form>
            <div class="button420 mt-2">
                <button class="boutonGeneral mr-4" id="modif-projet">
                    Modifier
                </button>
                <button class="boutonGeneral" id="modif-projet">
                    Supprimer
                </button>
            </div> -->
        </section>

    </main>
    @include('includes.footer')
    <script src="./assets/js/admin.js"></script>
</body>

</html>
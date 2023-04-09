<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Hub - Admin Dashboard</title>
    <link rel="icon" type="image/png" href="assets/images/ico/logo_blanc.ico">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
                        <li class="active" onclick="showTable('tableUtilisateur')">Utilisateurs</li>
                        <li onclick="showTable('tableProjet')">Projets</li>
                        <li>Commentaires</li>
                    </ul>
                    <a href="home" class="boutonGeneral">Revenir à l'accueil</a>
                </nav>
            </div>

            <div class="barreRecherche">
                <div class="barreRechercheWrapper">
                    <label for="search">Rechercher un utilisateur</label>
                    <div class="barreRechercheContainer">
                        <input type="search" id="search" placeholder="Rechercher un utilisateur..."
                            class="searchUtilisateur" onkeyup="filterTable('tableUtilisateur', this.value)">
                    </div>

                    <label for="searchProjet">Rechercher un projet</label>
                    <div class="barreRechercheContainer">
                        <input type="search" id="searchProjet" placeholder="Rechercher un projet..."
                            class="searchProjet hidden" onkeyup="filterTable('tableProjet', this.value)">
                    </div>
                </div>
            </div>


            <table id="tableUtilisateur">
                <tr class="headerTable">
                    <th>ID User</th>
                    <th>Nom</th>
                    <th>Adresse email</th>
                    <th>Mot de passe</th>
                    <th>Date de création</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td class="tdIdentifiantUser">{{ $user->id_user }}</td>
                    <td class="tdUtilisateur">{{ $user->prenom_user }} {{ $user->nom_user }}</td>
                    <td class="tdEmail"><a href="mailto:{{ $user->email_user }}">{{ $user->email_user }}</a></td>
                    <td class="tdMotDePasse">{{ $user->mdp_user }}</td>
                    <td class="tdDateCreation">{{ $user->created_at }}</td>
                    <td class="tdRole">{{ $user->role_user }}</td>
                    <td class="tdActions">
                        <a href="{{ route('admin.edit-user', $user->id_user) }}" title="Modifier"><i
                                class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.delete-user', $user->id_user) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Supprimer"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            <table id="tableProjet" class="hidden">
                <tr class="headerTable">
                    <th>ID Projet</th>
                    <th>Créateur du projet</th>
                    <th>Titre du projet</th>
                    <th>Description projet</th>
                    <th>Image projet</th>
                    <th>Date de création</th>
                    <th>Note projet</th>
                </tr>
                @foreach ($projets as $projet)
                <tr>
                    <td class="tdIdentifiantProjet">{{ $projet->id_projet }}</td>
                    <td class="tdCreateur">{{ $projet->user_id }}</td>
                    <td class="tdTitreProjet">{{ $projet->titre_projet }}</td>
                    <td class="tdDescription">{{ $projet->description_projet }}</td>
                    <td class="tdImage">{{ $projet->image_projet }}</td>
                    <td class="tdCreationProjet">{{ $projet->created_at }}</td>
                    <td class="tdNote">{{ $projet->note_projet }} / 20</td>
                </tr>
                @endforeach
            </table>
        </section>

    </main>
    @include('includes.footer')
    <script src="./assets/js/admin.js"></script>
</body>

</html>
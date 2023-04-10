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

            <div class="headerSection mb-4">
                <nav>
                    <ul>
                        <li class="active" onclick="showTable('tableUtilisateur')">Utilisateurs</li>
                        <li onclick="showTable('tableProjet')">Projets</li>
                    </ul>
                    <div class="titre_nav">
                        <h1>Admin Dashboard</h1>
                        <i class="bi bi-person-rolodex"></i>
                    </div>
                </nav>
            </div>

            <div class="barreRecherche">
                <div class="barreRechercheWrapper">
                    <div class="rechercherContainer">
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

                    <p id="compteurUser">Nombre d'utilisateurs inscrits : {{ $userCount }}</p>
                    <p id="compteurProjets" class="hidden">Nombre de projets : {{ $projetCount }}</p>

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

                        <a href="#" data-user-id="{{ $user->id_user }}" data-user-role="{{ $user->role_user }}"
                            class="edit-user-btn"><i class="bi bi-pencil-square"></i></a>
                        <div class="edit-user-form" style="display:none">
                            <form method="POST" action="{{ route('admin.edit-user') }}">
                                @csrf
                                <input type="hidden" class="edit-user-id" name="user_id" value="">
                                <label for="edit-user-role">Rôle:</label>
                                <select id="edit-user-role" name="role">
                                    @if ($user->role_user == "Etudiant")
                                    <option value="Professeur">Professeur</option>
                                    <option value="Administrateur">Administrateur</option>
                                    @elseif ($user->role_user == "Professeur")
                                    <option value="Etudiant">Etudiant</option>
                                    <option value="Administrateur">Administrateur</option>
                                    @else
                                    <option value="Etudiant">Etudiant</option>
                                    <option value="Professeur">Professeur</option>
                                    @endif
                                </select>
                                <button type="submit" class="boutonGeneral">Enregistrer</button>
                                <button type="button" class="boutonGeneral cancel-edit-user">Annuler</button>

                            </form>
                        </div>

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
                    <th>Date de création et mise à jour</th>
                    <th>Note projet / 20</th>
                    <th>Actions</th>
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
                    <td class="tdActions">
                        <a href="#" data-projet-id="{{ $projet->id_projet }}"
                            data-projet-titre="{{ $projet->titre_projet }}"
                            data-projet-description="{{ $projet->description_projet }}"
                            data-projet-domaine="{{ $projet->domaine_projet }}"
                            data-projet-note="{{ $projet->note_projet }}" class="edit-projet-btn"><i
                                class="bi bi-pencil-square"></i></a>
                        <div class="edit-projet-form" style="display:none">
                            <form method="POST" action="{{ route('admin.edit-projet') }}">
                                @csrf
                                @method('POST')
                                <input type="hidden" class="edit-projet-id" name="projet_id" value="">
                                <label for="edit-projet-titre">Titre du projet :</label>
                                <input type="text" id="edit-projet-titre" name="titre" value="">
                                <label for="edit-projet-description">Description du projet :</label>
                                <textarea id="edit-projet-description" name="description"></textarea>
                                <label for="edit-projet-domaine">Domaine du projet :</label>
                                <select id="edit-projet-domaine" name="domaine">
                                    <option value="Communication">Communication</option>
                                    <option value="Web">Web</option>
                                    <option value="Audiovisuel">Audiovisuel</option>
                                    <option value="Graphisme">Graphisme</option>
                                </select>
                                <label for="edit-projet-note">Note du projet :</label>
                                <input type="number" id="edit-projet-note" name="note" min="0" max="20" step="1"
                                    value="">
                                <button type="submit" class="boutonGeneral">Enregistrer</button>
                                <button type="button" class="boutonGeneral cancel-edit-projet">Annuler</button>
                            </form>
                        </div>
                        <form method="POST" action="{{ route('admin.delete-projet', $projet->id_projet) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Supprimer"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>

        </section>

    </main>
    @include('includes.footer')
    <script src="./assets/js/admin.js"></script>
</body>

</html>
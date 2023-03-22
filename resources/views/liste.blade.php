<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projets as $projet)
            <tr>
                <td>{{ $projet->titre_projet }}</td>
                <td>{{ $projet->description_projet }}</td>
                <td>{{ $projet->date_projet }}</td>
            </tr>
        @endforeach
    </tbody>
</table>





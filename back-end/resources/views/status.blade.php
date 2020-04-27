<table>
    <thead>
        <tr>
            <th>NOMBRE</th>
            <th>STATUS</th>
            <th>INTERESES</th>
            <th>TALENTOS</th>
            <th>TEMPERAMENTOS</th>
        </tr>
    </thead>
    <tbody>
    @foreach($personas as $p)
        <tr>
            <td>{{ $p->nombres }} {{ $p->apellido_paterno }} {{ $p->apellido_materno }}</td>
            <td>{{ $p->status }}</td>
            <td>{{ $p->link_intereses }}</td>
            <td></td>
            <td>{{ $p->link_temperamentos }}</td>
        </tr>
      @endforeach
    </tbody>
</table>
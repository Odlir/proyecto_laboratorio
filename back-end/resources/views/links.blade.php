<table>
    <thead>
    <tr>
        <th>NOMBRE</th>
        <th>INTERESES</th>
        <th>TEMPERAMENTOS</th>
    </tr>
    </thead>
    <tbody>
    @foreach($personas as $p)
        <tr>
            <td>{{ $p->nombres }} {{ $p->apellido_paterno }} {{ $p->apellido_materno }}</td>
            <td>{{ $p->link_intereses }}</td>
            <td></td>
        </tr>
      @endforeach
    </tbody>
</table>
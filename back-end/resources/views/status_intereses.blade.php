<table>
    <thead>
        <tr>
            <th>NOMBRE</th>
            <th>STATUS INTERESES</th>
            <th>INTERESES</th>
        </tr>
    </thead>
    <tbody>
    @foreach($personas as $p)
        <tr>
            <td>{{ $p->nombres }} {{ $p->apellido_paterno }} {{ $p->apellido_materno }}</td>
            <td>{{ $p->status_int }}</td>
            <td>{{ $p->link_intereses }}</td>
        </tr>
      @endforeach
    </tbody>
</table>
<table>
    <thead>
    <tr>
        <th>NOMBRE</th>
        <th>{{ $tipo }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($personas as $p)
        <tr>
            <td>{{ $p->nombres }} {{ $p->apellido_paterno }} {{ $p->apellido_materno }}</td>
            <td>{{ $p->link }}</td>
        </tr>
      @endforeach
    </tbody>
</table>
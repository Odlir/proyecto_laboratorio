<table>
    <thead>
    <tr>
        <th>NOMBRE</th>
        <th>INTERESES</th>
        @if ($show)
            <th>TALENTOS</th>
            <th>TEMPERAMENTOS</th>
        @endif

    </tr>
    </thead>
    <tbody>
    @foreach($personas as $p)
        <tr>
            <td>{{ $p->nombres }} {{ $p->apellido_paterno }} {{ $p->apellido_materno }}</td>
            <td>{{ $p->link_intereses }}</td>
            @if ($show)
            <td></td>
            <td>{{ $p->link_temperamentos }}</td>
            @endif       
        </tr>
      @endforeach
    </tbody>
</table>
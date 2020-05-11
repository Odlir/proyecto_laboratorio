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
            <td><a href="{{ $p->link_intereses }}">{{ $p->link_intereses }}</a></td>
            @if ($show)
            <td></td>
            <td><a href="{{ $p->link_temperamentos }}">{{ $p->link_temperamentos }}</a></td>
            @endif       
        </tr>
      @endforeach
    </tbody>
</table>
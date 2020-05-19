<table>
    <thead>
        <tr>
            <th>NOMBRE</th>
            <th>STATUS INTERESES</th>
            <th>INTERESES</th>
            @if ($show)
                <th>STATUS TALENTOS</th>
                <th>TALENTOS</th>
                <th>STATUS TEMPERAMENTOS</th>
                <th>TEMPERAMENTOS</th>
            @endif   
            <th>CONSOLIDADO</th>       
        </tr>
    </thead>
    <tbody>
    @foreach($personas as $p)
        <tr>
            <td>{{ $p->nombres }} {{ $p->apellido_paterno }} {{ $p->apellido_materno }}</td>
            <td>{{ $p->status_int }}</td>
            <td>@if ($p->status_int=="Completado")
                {{ $p->link_intereses }}
                @else
                <a href="{{ $p->link_intereses }}">{{ $p->link_intereses }}</a>
                @endif
            </td>
            @if ($show)
                <td>{{ $p->status_tal }}</td>
                <td>
                    @if ($p->status_tal=="Completado")
                    {{ $p->link_talentos }}
                    @else
                    <a href="{{ $p->link_talentos }}">{{ $p->link_talentos }}</a>
                    @endif
                </td>

                <td>{{ $p->status_temp }}</td>
                <td>
                    @if ($p->status_temp=="Completado")
                    {{ $p->link_temperamentos }}
                    @else
                    <a href="{{ $p->link_temperamentos }}">{{ $p->link_temperamentos }}</a>
                    @endif
                </td>
            @endif  
            <td> @if ($p->link_consolidado)
                <a href="{{ $p->link_consolidado }}">{{ $p->link_consolidado }}</a>
                @endif
            </td> 
        </tr>
      @endforeach
    </tbody>
</table>
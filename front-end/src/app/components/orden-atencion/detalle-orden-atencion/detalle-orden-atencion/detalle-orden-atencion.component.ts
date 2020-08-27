import { HttpParams } from '@angular/common/http';
import { RoutingStateService } from 'src/app/Services/routing/routing-state.service';
import { ApiBackRequestService } from 'src/app/Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-detalle-orden-atencion',
  templateUrl: './detalle-orden-atencion.component.html',
  styleUrls: ['./detalle-orden-atencion.component.css']
})
export class DetalleOrdenAtencionComponent implements OnInit {

  public form = {
    id: null,
    nro_atencion: null,
    fecha_atencion: null,
    hora_atencion: null,
    paciente: null,
    analisis: null,
    estado: null,
    
    insert_user_id: null,
    edit_user_id: null,
    insert: { name: null },
    edit: { name: '' },
    created_at: null,
    updated_at: null
  };

  previousUrl: string;

  public encuesta_id: HttpParams;

  constructor(private api: ApiBackRequestService, private router: Router, private activatedRoute: ActivatedRoute, private routingState: RoutingStateService) { }

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe(async params => {
      const id = params.id;
      this.encuesta_id = params.encuesta_id;
      if (id != null) {
        this.cargar(id);
      }
    });

    this.previousUrl = this.routingState.getPreviousUrl();
  }

  cargar(id) {
    this.api.get('orden_atencion', id).subscribe(
      (data) => {
        this.form = data
      }
    );
  }

  eliminar(id) {
    Swal.fire({
      title: 'Desea eliminar el registro?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmar'
    }).then((result) => {
      if (result.value) {
        this.api.delete('orden_atencion', id).subscribe(
          (data) => {
            this.return();
          }
        );
      }
    })
  }

  return() {
    if (this.previousUrl.includes('encuesta')) {
      if (this.previousUrl.includes('detalle')) {
        this.router.navigateByUrl('detalle-encuesta?id=' + this.encuesta_id + '&tab=1');
      }
      else {
        this.router.navigateByUrl('crud-encuesta?id=' + this.encuesta_id + '&tab=1');
      }
    }
    else {
      this.router.navigateByUrl(this.previousUrl);
    }
  }

}

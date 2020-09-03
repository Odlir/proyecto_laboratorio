import { HttpParams } from '@angular/common/http';
import { RoutingStateService } from 'src/app/Services/routing/routing-state.service';
import { ApiBackRequestService } from 'src/app/Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import Swal from 'sweetalert2';
import * as moment from 'moment';

@Component({
  selector: 'app-detalle-orden-atencion-analisis',
  templateUrl: './detalle-orden-atencion-analisis.component.html',
  styleUrls: ['./detalle-orden-atencion-analisis.component.css']
})
export class DetalleOrdenAtencionAnalisisComponent implements OnInit {

  public form = {
    id: null,
    analisis: null,
    muestras: null,
    forma_pago: null,
    factura_boleta: null,
    estado_analisis: null,
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
    this.api.get('orden_atencion_analisis', id).subscribe(
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
        this.api.delete('orden_atencion_analisis', id).subscribe(
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

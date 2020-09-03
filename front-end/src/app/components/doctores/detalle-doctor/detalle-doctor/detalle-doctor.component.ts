import { HttpParams } from '@angular/common/http';
import { RoutingStateService } from './../../../../Services/routing/routing-state.service';
import { ApiBackRequestService } from './../../../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-detalle-doctor',
  templateUrl: './detalle-doctor.component.html',
  styleUrls: ['./detalle-doctor.component.css']
})
export class DetalleDoctorComponent implements OnInit {

  public form = {
    id: null,
    tipo_documento: null,
    nro_documento: null,
    nombres: null,
    apellido_materno: null,
    apellido_paterno: null,
    firma: null,
    nro_colegiatura: null,
    fecha_nacimiento: null,
    edad: null,
    sexo: null,
    nro_celular: null,
    email: null,
    direccion: null,
    referencias: null,
    tipo_doctor: null,
    observaciones: null,
    estado: null,
    especialidad_id: null,
    ubigeo_id: null,

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
    this.api.get('doctores', id).subscribe(
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
        this.api.delete('doctores', id).subscribe(
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

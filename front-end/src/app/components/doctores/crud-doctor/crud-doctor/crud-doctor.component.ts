import { RoutingStateService } from 'src/app/Services/routing/routing-state.service';
import { HttpParams } from '@angular/common/http';
import { Router, ActivatedRoute } from '@angular/router';
import { TokenService } from 'src/app/Services/token/token.service';
import { ApiBackRequestService } from 'src/app/Services/api-back-request.service';
import { Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-crud-doctor',
  templateUrl: './crud-doctor.component.html',
  styleUrls: ['./crud-doctor.component.css']
})
export class CrudDoctorComponent implements OnInit {

  public form = {
    tipo_documento: null,
    nro_documento: null,
    nombres: null,
    apellido_materno: null,
    apellido_paterno: null,
    especialidad: null,
    nro_colegiatura: null,
    fecha_nacimiento: null,
    edad: null,
    sexo: null,
    nro_celular: null,
    email: null,
    direccion: null,
    latitud: null,
    longitud: null,
    departamento: null,
    provincia: null,
    referencias: null,
    tipo_paciente: null,
    observaciones1: null,
    observaciones2: null,
    estado: null,

    insert_user_id: this.user.me(),
    edit_user_id: null,
    insert: { name: null },
    edit: { name: '' },
    created_at: null,
    updated_at: null
  };

  public id: HttpParams;

  public encuesta_id: HttpParams

  previousUrl: string;


  constructor(
    private api: ApiBackRequestService,
    private user: TokenService,
    private router: Router,
    private activatedRoute: ActivatedRoute,
    private routingState: RoutingStateService) { }

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe(async params => {
      this.id = params.id;
      this.encuesta_id = params.encuesta_id;
      if (this.id != null) {
        this.cargarEditar();
      }
    });

    this.previousUrl = this.routingState.getPreviousUrl();
  }

  cargarEditar() {
    this.api.get('doctores', this.id).subscribe(
      (data) => {
        this.form = data
        }
      );
  }

  guardar() {
    if (this.id) {
      this.editar();
    }
    else {
      this.registrar();
    }
  }

  registrar() {
    this.api.post('doctores', this.form).subscribe(
      (data) => {
        this.return()
        }
      );
  }

  editar() {
    this.form.edit_user_id = this.user.me();

    this.api.put('doctores', this.id, this.form).subscribe(
      (data) => {
        this.return()
        }
      );
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


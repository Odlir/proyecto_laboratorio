import { RoutingStateService } from 'src/app/Services/routing/routing-state.service';
import { HttpParams } from '@angular/common/http';
import { Router, ActivatedRoute } from '@angular/router';
import { TokenService } from 'src/app/Services/token/token.service';
import { ApiBackRequestService } from 'src/app/Services/api-back-request.service';
import { Component, OnInit} from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-crud-orden-atencion',
  templateUrl: './crud-orden-atencion.component.html',
  styleUrls: ['./crud-orden-atencion.component.css']
})
export class CrudOrdenAtencionComponent implements OnInit {

  public form = {
    nro_atencion: null,
    paciente: null,
    analisis: null,
    estado_oa: null,
    estado: 1,

    insert_user_id: this.user.me(),
    edit_user_id: null,
    insert: { name: null },
    edit: { name: '' },
    created_at: null,
    updated_at: null
  };
  
  formOrdenAtencion: FormGroup;

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
    this.validarDatos();
  }

  validarDatos() {
    this.formOrdenAtencion = new FormGroup({
      'nroaten': new FormControl('', [
        Validators.required,
        Validators.pattern('[0-9]{1,10}')
      ]),
      'paciente': new FormControl('', [
        Validators.required
      ]),
      'analisis': new FormControl('', [
        Validators.required
      ]),
      'estadooa': new FormControl('', [
        Validators.required
      ]),
    });
  }

  cargarEditar() {
    this.api.get('orden_atencion', this.id).subscribe(
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
    if (this.formOrdenAtencion.valid) {
      console.log(this.formOrdenAtencion.value);
      this.api.post('orden_atencion', this.form).subscribe(
        (data) => {
          this.return()
          }
      );
    }
    else{
      Swal.fire({
        title: 'Complete los datos correctamente',
        icon: 'warning',
        showCancelButton: false,
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'OK'
      })
    }
  }

  editar() {
    this.form.edit_user_id = this.user.me();

    this.api.put('orden_atencion', this.id, this.form).subscribe(
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

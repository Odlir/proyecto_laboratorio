import { RoutingStateService } from 'src/app/Services/routing/routing-state.service';
import { HttpParams } from '@angular/common/http';
import { Router, ActivatedRoute } from '@angular/router';
import { TokenService } from 'src/app/Services/token/token.service';
import { ApiBackRequestService } from 'src/app/Services/api-back-request.service';
import { Component, OnInit} from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-crud-muestras',
  templateUrl: './crud-muestras.component.html',
  styleUrls: ['./crud-muestras.component.css']
})
export class CrudMuestrasComponent implements OnInit {

  public form = {
    nro_muestra: null,
    descripcion: null,
    p_unitario: null,
    observaciones: null,
    estado: 1,

    insert_user_id: this.user.me(),
    edit_user_id: null,
    insert: { name: null },
    edit: { name: '' },
    created_at: null,
    updated_at: null
  };

  formMuestras: FormGroup;

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
    this.formMuestras = new FormGroup({
      'nromuestra': new FormControl('', [
        Validators.required,
        Validators.pattern('[0-9]{1,10}')
      ]),
      'desc': new FormControl('', [
        Validators.required,
        Validators.minLength(3),
        Validators.maxLength(250)
      ]),
      'punit': new FormControl('', [
        Validators.required,
        Validators.pattern('[0-9]{1,10}')
      ]),
      'obs': new FormControl('', [
        Validators.required,
        Validators.minLength(3),
        Validators.maxLength(250)
      ])
    });
  }

  cargarEditar() {
    this.api.get('muestras', this.id).subscribe(
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
    if (this.formMuestras.valid) {
      console.log(this.formMuestras.value);
      this.api.post('muestras', this.form).subscribe(
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

    this.api.put('muestras', this.id, this.form).subscribe(
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

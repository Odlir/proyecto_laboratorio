import { HttpParams } from '@angular/common/http';
import Swal from 'sweetalert2';
import { Router, ActivatedRoute } from '@angular/router';
import { TokenService } from '../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-crud-persona',
  templateUrl: './crud-persona.component.html',
  styleUrls: ['./crud-persona.component.css']
})
export class CrudPersonaComponent implements OnInit {

	public form = {
    nombres: null,
    apellido_materno: null,
    apellido_paterno: null,
    sexo: null,
    email: null,
    insert_user_id: this.user.me(),
    edit_user_id: null,
    insert: {name: null},
    edit: {name: ''},
    created_at: null,
    updated_at: null
  };

  public id: HttpParams;

  constructor(
    private api: ApiBackRequestService,
    private user: TokenService,
    private router: Router,
    private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe(async params => {
        this.id = params.id;
        if (this.id != null) {
          this.cargarEditar();
        }
    });
  }

  async cargarEditar()
  {
    await this.api.show('personas', this.id).toPromise().then(
      (data) => {this.form = data}
    );
  }

  guardar()
  {
    if(this.id)
    {
      this.editar();
    }
    else
    {
      this.registrar();
    }
  }

  async registrar()
  {
    await this.api.post('personas', this.form).toPromise().then(
      (data) => {this.cerrar('Registro Exitoso')}
    );
  }

  async editar()
  { this.form.edit_user_id = this.user.me();

    await this.api.put('personas', this.id , this.form).toPromise().then(
      (data) => {this.cerrar('Datos Actualizados Correctamente')}
    );
  }

  cerrar(mensaje)
  {
    Swal.fire({
      title: mensaje,
      icon: 'success',
      showClass: {
        popup: 'animated fadeInDown faster'
      },
      hideClass: {
        popup: 'animated fadeOutUp faster'
      }
    });
    this.router.navigateByUrl('/personas');
  }

}

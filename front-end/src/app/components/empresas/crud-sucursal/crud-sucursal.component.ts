import { TokenService } from './../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { HttpParams } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-crud-sucursal',
  templateUrl: './crud-sucursal.component.html',
  styleUrls: ['./crud-sucursal.component.css']
})
export class CrudSucursalComponent implements OnInit {

	public id: HttpParams;

	form = {
		codigo: null,
		nombre: null,
		direccion: null,
		telefono :null,
		pais_id: null,
		ciudad_id: null,
		insert_user_id: this.user.me(),
		edit_user_id: null,
		empresa_id: null,
		insert: {name: null},
		edit: {name: ''},
		created_at: null,
		updated_at: null,
	}

	empresa = {
		razon_social: null
	}

	paises = [];
	ciudades = [];

  constructor(private router: Router, private user: TokenService, private api: ApiBackRequestService, private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
		this.activatedRoute.queryParams.subscribe(async params => {
			this.form.empresa_id = params.empresa_id;
		});

		this.activatedRoute.queryParams.subscribe(async params => {
			this.id = params.id;
			if (this.id != null) {
				this.cargarEditar();
			}
		});

	this.cargarUbigeo();

	}

	async cargarEditar()
  {
    await this.api.show('empresa_sucursal', this.id).toPromise().then(
      (data) => {this.form = data}
		);

	await this.api.show('empresas', this.form.empresa_id).toPromise().then(
		(data) => {this.empresa = data}
		);

	this.getCiudades(this.form.pais_id);
  }

	async cargarUbigeo()
	{
		await this.api.get('paises').toPromise().then(
			(data) => {this.paises=data;}
		);
	}

	limpiarSucursal()
	{
		this.form = {
			codigo: null,
			nombre: null,
			direccion: null,
			telefono :null,
			pais_id: null,
			ciudad_id: null,
			insert_user_id: this.user.me(),
			edit_user_id: null,
			empresa_id: null,
			insert: {name: null},
			edit: {name: ''},
			created_at: null,
			updated_at: null,
		}
	}

	async getCiudades(id)
	{
		await this.api.show('ciudades',id).toPromise().then(
			(data) => {this.ciudades=data;}
		);
	}


	async guardar()
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
		await this.api.post('empresa_sucursal', this.form).toPromise().then(
			(data) => {
				this.cerrar('Registro Exitoso');
			}
		);
	}

	async editar()
  {	this.form.edit_user_id = this.user.me();
    await this.api.put('empresa_sucursal', this.id , this.form).toPromise().then(
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

	this.returnCrud();
	}

	returnCrud()
	{
		this.router.navigateByUrl('/crud-empresa?id='+this.form.empresa_id+'&tab='+1);
	}

}

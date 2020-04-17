import { RoutingStateService } from './../../../Services/routing/routing-state.service';
import { TokenService } from './../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { HttpParams } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-crud-sucursal',
  templateUrl: './crud-sucursal.component.html',
  styleUrls: ['./crud-sucursal.component.css']
})
export class CrudSucursalComponent implements OnInit {

	public id: HttpParams;

	form = {
		nombre: null,
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

	previousUrl: string;

	tab = null;

  constructor(
	private router: Router,
	private user: TokenService,
	private api: ApiBackRequestService,
	private activatedRoute: ActivatedRoute,
	private routingState: RoutingStateService
	) {

  }

  ngOnInit(): void {
		this.activatedRoute.queryParams.subscribe(async params => {
			this.form.empresa_id = params.empresa_id;
			this.cargarEmpresa(this.form.empresa_id);
		});

		this.activatedRoute.queryParams.subscribe(async params => {
			this.id = params.id;
			this.tab = params.tab;
			if (this.id != null) {
				this.cargarEditar();
			}
		});

	this.previousUrl=this.routingState.getPreviousUrl();
	}

	async cargarEmpresa(id)
	{
		await this.api.show('empresas',id).toPromise().then(
			(data) => {
					  this.empresa = data;
					  }
		  );
	}

	async cargarEditar()
  {
    await this.api.show('empresa_sucursal', this.id).toPromise().then(
      (data) => {this.form = data}
		);

		this.cargarEmpresa(this.form.empresa_id);
  }


	limpiarSucursal()
	{
		this.form.nombre = null;
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
				this.limpiarSucursal();
			}
		);
	}

	async editar()
  {	this.form.edit_user_id = this.user.me();
    await this.api.put('empresa_sucursal', this.id , this.form).toPromise().then(
      (data) => {
		  this.returnCrud();
		}
    );
  }

	returnCrud()
	{
		if(this.previousUrl.includes('detalle'))
		{
			this.router.navigateByUrl('detalle-empresa?id='+this.form.empresa_id+'&tab=1');
		}
		else
		{
			this.router.navigateByUrl('crud-empresa?id='+this.form.empresa_id+'&tab=1');
		}

	}

}

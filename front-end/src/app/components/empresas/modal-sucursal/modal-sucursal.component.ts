import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { SharedVarService } from './../../../Services/shared/shared-var.service';
import { TokenService } from './../../../Services/token/token.service';
import { Component, OnInit} from '@angular/core';
import { BsModalRef } from 'ngx-bootstrap/modal/';

@Component({
  selector: 'app-modal-sucursal',
  templateUrl: './modal-sucursal.component.html',
  styleUrls: ['./modal-sucursal.component.css']
})
export class ModalSucursalComponent implements OnInit {

	form = {
		codigo: null,
		nombre: null,
		direccion: null,
		telefono :null,
		pais_id: null,
		ciudad_id: null
	}

	paises = [];
	ciudades = [];

  constructor(private api: ApiBackRequestService,public bsModalRef: BsModalRef,private sharedService: SharedVarService) { }

  	ngOnInit(): void {
		this.cargarUbigeo();
	}

	async cargarUbigeo()
	{
		await this.api.get('paises').toPromise().then(
			(data) => {this.paises=data;}
		);
	}

	async getCiudades()
	{
		await this.api.show('ciudades',this.form.pais_id).toPromise().then(
			(data) => {this.ciudades=data;}
		);
	}

	anadir()
	{
		this.sharedService.sendSucursal(this.form);
		this.bsModalRef.hide()
		this.limpiar();
	}

	limpiar()
	{
		this.form = {
		codigo: null,
		nombre: null,
		direccion: null,
		telefono :null,
		pais_id: null,
		ciudad_id: null
	}
	}

	cancelar()
	{
		this.form = {
			codigo: null,
			nombre: null,
			direccion: null,
			telefono :null,
			pais_id: null,
			ciudad_id: null,

		}
		this.bsModalRef.hide()
	}
}

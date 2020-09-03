import { MatStepper } from '@angular/material/stepper';
import { HttpParams } from '@angular/common/http';
import { ActivatedRoute, Router } from '@angular/router';
import { TokenService } from '../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit, ViewChild } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import {map, startWith} from "rxjs/operators";

export interface Ubigeo {
    ubigeo: string,
    distrito: string,
    provincia: string,
    departamento: string,
	id: number,
}

@Component({
	selector: 'app-crud-empresa',
	templateUrl: './crud-empresa.component.html',
	styleUrls: ['./crud-empresa.component.css']
})

export class CrudEmpresaComponent implements OnInit {

	firstFormGroup: FormGroup;
	secondFormGroup: FormGroup;
	myControl = new FormControl();

	@ViewChild('stepper') stepper: MatStepper;

	public form = {
		nro_ruc: null,
		razon_social: null,
		pag_web: null,
		direccion: null,
		telf_fijo: null,
		nro_celular: null,
		nombre_contacto1: null,
		telf_fijo1: null,
		nro_celular1: null,
		email_contacto1: null,
		nombre_contacto2: null,
		telf_fijo2: null,
		nro_celular2: null,
		email_contacto2: null,
		nombre_banco: null,
		nro_cta: null,
		nro_cta_interbancaria: null,
		observaciones: null,
		estado: 1,
		ubigeo_id: null,
		
		insert_user_id: this.user.me(),
		edit_user_id: null,
		insert: { name: null },
		edit: { name: '' },
		created_at: null,
		updated_at: null,
		sucursales: []
	};

	public titulo = "CREAR EMPRESA";

	formEmpresa: FormGroup;

	public ubigeos: Ubigeo[] = [];

	public ubigeo = {
	    id: null,
		ubigeo: null,
		distrito: null,
		provincia: null,
		departamento: null
	}

	filteredUbigeo: any;
	public disabled: boolean = false;

	public showProgress: boolean = false;

	public id: HttpParams;
	public generarSucursal = false;

	constructor(
		private api: ApiBackRequestService,
		private user: TokenService,
		private activatedRoute: ActivatedRoute,
		private router: Router
	) {
	}

	ngOnInit(): void {
		this.activatedRoute.queryParams.subscribe(async params => {
			this.id = params.id;
			let tab = params.tab;
			if (this.id != null) {
				if (tab != null) {
					this.cargarEditar(1);
				}
				else {
					this.cargarEditar();
				}
			}
		});
		this.fetch();
		this.validarDatos();
	}

	validarDatos() {
		this.formEmpresa = new FormGroup({
		  'nroruc': new FormControl('', [
			Validators.required,
			Validators.minLength(11),
			Validators.maxLength(11),
			Validators.pattern('[0-9]{11,11}')
		  ]),
		  'razonsocial': new FormControl('', [
			Validators.required,
			Validators.minLength(3),
			Validators.pattern('[a-zA-Z]{3,254}')
		  ]),
		  'pagweb': new FormControl('', [
			Validators.required,
			Validators.minLength(3),
			Validators.pattern('[a-zA-Z]{3,254}')
		  ]),
		  'direccion': new FormControl('', [
			Validators.maxLength(250)
		  ]),
		  'telf': new FormControl('', [
			Validators.required,
			Validators.minLength(7),
			Validators.maxLength(7),
			Validators.pattern('[0-9]{7,7}')
		  ]),
		  'nrocel': new FormControl('', [
			Validators.required,
			Validators.minLength(9),
			Validators.maxLength(9),
			Validators.pattern('[0-9]{9,9}')
		  ]),
		  'nomcont1': new FormControl('', [
			Validators.minLength(3),
			Validators.pattern('[a-zA-Z]{3,254}')
		  ]),
		  'telf1': new FormControl('', [
			Validators.minLength(7),
			Validators.maxLength(7),
			Validators.pattern('[0-9]{7,7}')
		  ]),
		  'nrocel1': new FormControl('', [
			Validators.minLength(9),
			Validators.maxLength(9),
			Validators.pattern('[0-9]{9,9}')
		  ]),
		  'emailcont1': new FormControl('', [
			Validators.pattern('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$')
		  ]),
		  'nomcont2': new FormControl('', [
			Validators.minLength(3),
			Validators.pattern('[a-zA-Z]{3,254}')
		  ]),
		  'telf2': new FormControl('', [
			Validators.minLength(7),
			Validators.maxLength(7),
			Validators.pattern('[0-9]{7,7}')
		  ]),
		  'nrocel2': new FormControl('', [
			Validators.minLength(9),
			Validators.maxLength(9),
			Validators.pattern('[0-9]{9,9}')
		  ]),
		  'emailcont2': new FormControl('', [
			Validators.pattern('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$')
		  ]),
		  'nombanco': new FormControl('', [
			Validators.minLength(3),
			Validators.pattern('[a-zA-Z]{3,254}')
		  ]),
		  'nrocta': new FormControl('', [
			Validators.minLength(12),
			Validators.maxLength(14),
			Validators.pattern('[0-9]{12,14}')
		  ]),
		  'nroctainter': new FormControl('', [
			Validators.minLength(20),
			Validators.maxLength(20),
			Validators.pattern('[0-9]{20,20}')
		  ]),
		  'obs': new FormControl('', [
			Validators.maxLength(250)
		  ])
		});
	}

	cargarEditar(next?) {
		this.titulo = "EDITAR EMPRESA";
		this.api.get('empresas', this.id).subscribe(
			(data) => {
				this.form = data;
				this.stepper.selected.completed = true;
				if (next) {
					this.stepper.next();
				}
			}
		);
	}

	cargarUbigeo(e) {
		this.api.get('ubigeo?search=' + e).subscribe(
			data => {
				this.ubigeos = data;
			}
		);
	}

	async fetch() {
		await this.api.get('ubigeo').toPromise() //ESTO LO PUSE ASINCRONO PARA QUE EL AUTOCOMPLETAR FUNCIONE
			.then(
				(data) => { this.ubigeos = data }
			);

		this.filteredUbigeo = this.myControl.valueChanges.pipe(
			startWith(null),
			map(ubigeo => ubigeo && typeof ubigeo === 'object' ? ubigeo.departamento : ubigeo),
			map(ubigeo => ubigeo && typeof ubigeo === 'object' ? ubigeo.provincia : ubigeo),
			map(ubigeo => ubigeo && typeof ubigeo === 'object' ? ubigeo.distrito : ubigeo),
			map(ubigeo => this.filterStates(ubigeo))
		);
	}

	filterStates(val) {
		return val ? this.ubigeos.filter(s => s.departamento.toLowerCase().indexOf(val.toLowerCase()) != -1)
			: this.ubigeos;
		return val ? this.ubigeos.filter(s => s.provincia.toLowerCase().indexOf(val.toLowerCase()) != -1)
			: this.ubigeos;
		return val ? this.ubigeos.filter(s => s.distrito.toLowerCase().indexOf(val.toLowerCase()) != -1)
			: this.ubigeos;
	}

	displayFn(ubigeo): string {
		return ubigeo ? ubigeo.departamento : ubigeo;
		return ubigeo ? ubigeo.provincia : ubigeo;
		return ubigeo ? ubigeo.distrito : ubigeo;
	}

	limpiar() {
		this.form.ubigeo_id = null;
		this.showProgress = false;
	}

	limpiarAutocomplete(e) {
		console.log('kasumi', e.target.value);
		if (e.target.value.length > 3) {
			this.cargarUbigeo(e.target.value);
		}
	}

	guardar() {
		if (this.id) {
			this.editar();
		}
		else {
			this.registrar();
		}
	}

	return() {
		this.router.navigateByUrl('/empresas');
	}

	registrar() {
		this.form.ubigeo_id = this.ubigeo.id;
		
		this.api.post('empresas', this.form).subscribe(
			(data) => {
				this.handleRegistrar(data);
			}
		);
	}


	handleRegistrar(data) {
		if (this.generarSucursal == false) {
			const form = {
				nombre: data.razon_social,
				empresa_id: data.id,
				insert_user_id: this.user.me(),
			}

			this.api.post('empresa_sucursal', form).subscribe(
				(data) => {
					this.return();
				}
			);
		}
		else {
			this.id = data.id;
			this.form = data;
			this.stepper.selected.completed = true;
			this.stepper.next();
			this.titulo = "EDITAR EMPRESA";
		}
	}

	handleEditar(data) {
		this.form = data;
	}

	editar() {
		this.form.edit_user_id = this.user.me();
		this.form.ubigeo_id = this.ubigeo.id;
		
		this.api.put('empresas', this.id, this.form).subscribe(
			(data) => {
				this.handleEditar(data);
			}
		);
	}

}


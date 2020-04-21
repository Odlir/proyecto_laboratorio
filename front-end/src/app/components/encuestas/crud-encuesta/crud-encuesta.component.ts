import Swal from 'sweetalert2';
import { map, startWith } from 'rxjs/operators';
import { Component, OnInit, ViewChild } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { TokenService } from '../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { HttpParams } from '@angular/common/http';
import { FormControl } from '@angular/forms';
import * as moment from 'moment';
import { FormGroup } from '@angular/forms';
import { MatStepper } from '@angular/material/stepper';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';

export interface Empresa {
	nombre: string,
	id: number,
}

@Component({
	selector: 'app-crud-encuesta',
	templateUrl: './crud-encuesta.component.html',
	styleUrls: ['./crud-encuesta.component.css']
})

export class CrudEncuestaComponent implements OnInit {

	fileToUpload: File = null;

	myControl = new FormControl();

	firstFormGroup: FormGroup;
	secondFormGroup: FormGroup;

	@ViewChild('stepper') stepper: MatStepper;

	public form = {
		fecha_inicio: moment().format('YYYY-MM-DD'),
		fecha_fin: null,
		empresa_sucursal_id: null,
		tipo_encuesta_id: 0,
		insert_user_id: this.user.me(),
		edit_user_id: null,
		insert: { name: null },
		edit: { name: '' },
		created_at: null,
		updated_at: null,
		personas: [],
		empresa: { nombre: null },
		todas: false
	};

	empresa = { id: null, nombre: null };

	public tipos: any[];

	public empresas: Empresa[] = [];
	filteredEmpresas: any;

	public id: HttpParams;

	public titulo = 'PROGRAMAR ENCUESTA';

	constructor(private api: ApiBackRequestService,
		private user: TokenService,
		private router: Router,
		private activatedRoute: ActivatedRoute,
		private modalService: NgbModal) {

	}

	ngOnInit(): void {
		this.fetch();

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
			else {
				this.obtenerFechaFin();
			}
		});
	}

	async fetch() {
		this.api.get('tipo_encuesta').subscribe(
			(data) => {
				this.tipos = data;
			}
		);

		await this.api.get('empresa_sucursal').toPromise() //ESTO LO PUSE ASINCRONO PARA QUE EL AUTOCOMPLETAR FUNCIONE
			.then(
				(data) => { this.empresas = data }
			);

		this.filteredEmpresas = this.myControl.valueChanges.pipe(
			startWith(null),
			map(empresa => empresa && typeof empresa === 'object' ? empresa.nombre : empresa),
			map(empresa => this.filterStates(empresa))
		);
	}

	filterStates(val) {
		return val ? this.empresas.filter(s => s.nombre.toLowerCase().indexOf(val.toLowerCase()) === 0)
			: this.empresas;
	}

	displayFn(empresa): string {
		return empresa ? empresa.nombre : empresa;
	}

	async cargarEditar(next?) {
		await this.api.get('encuestas', this.id).subscribe(
			(data) => {
				this.form = data;
				this.titulo = 'EDITAR ENCUESTA PROGRAMADA';
			}
		);

		await this.api.get('empresa_sucursal', this.form.empresa_sucursal_id).subscribe(
			(data) => {
				this.empresa = data;
			}
		);

		this.stepper.selected.completed = true;

		if (next) {
			this.stepper.next();
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

	registrar() {
		this.form.empresa_sucursal_id = this.empresa.id;

		if (this.form.tipo_encuesta_id == 0) {
			this.form.todas = true;

			this.api.post('encuestas', this.form).subscribe(
				(data) => {
					if (this.fileToUpload != null) {
						this.subirExcel(data.encuesta_general_id, 0);
					}
					else {
						this.router.navigateByUrl('/encuestas');
					}
				}
			);
		} else {
			this.api.post('encuestas', this.form).subscribe(
				(data) => {
					if (this.fileToUpload != null) {
						this.subirExcel(data.encuesta_general_id, 0);
					}
					else {
						this.router.navigateByUrl('/encuestas');
					}
				}
			);
		}
	}

	subirExcel(encuesta_id, element,) {
		const formData: FormData = new FormData();
		formData.append('file', this.fileToUpload);
		formData.append('user_id', this.user.me());
		formData.append('campo', 'persona');
		formData.append('encuesta_id', encuesta_id);

		this.api.uploadFiles('importar', formData).subscribe(
			(data) => {
				if (element == 0) {
					this.mensaje('Importación Exitosa', 3000, 'success');
				}
			},
			(error) => {
				if (element == 0) {
					this.mensaje('Hubo errores en la Importación', 3000, 'warning');
				}
			}
		);
	}

	mensaje(msj, time, ico) {
		Swal.fire({
			title: msj,
			icon: ico,
			timer: time
		});

		this.router.navigateByUrl('/encuestas');
	}

	editar() {
		this.form.edit_user_id = this.user.me();
		this.form.empresa_sucursal_id = this.empresa.id;

		this.api.put('encuestas', this.id, this.form).subscribe(
			(data) => {
				this.cargarEditar()
			}
		);
	}

	obtenerFechaFin() {
		this.form.fecha_fin = null;

		var fin = moment(this.form.fecha_inicio).add(+3, 'M');

		this.form.fecha_fin = moment(fin).format('YYYY-MM-DD')
	}

	descargarPlantilla() {
		let form = {
			campo: 'persona',
			archivo: 'importar-alumnos.xlsx'
		}

		this.api.downloadFile('exportar', form).toPromise().then(
			(data) => { }
		);
	}

	handleFileInput(files: FileList) {
		this.fileToUpload = files.item(0);
	}
}

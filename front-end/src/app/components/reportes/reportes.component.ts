import { Router } from '@angular/router';
import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2';
import { NgProgress, NgProgressRef } from 'ngx-progressbar';
import { FormControl } from '@angular/forms';
import { map, startWith } from 'rxjs/operators';

export interface Empresa {
	nombre: string,
	id: number,
}


@Component({
	selector: 'app-reportes',
	templateUrl: './reportes.component.html',
	styleUrls: ['./reportes.component.css']
})

export class ReportesComponent implements OnInit {

	myControl = new FormControl();

	public form = {
		interes_id: null,
		campo: null,
		archivo: null,
		empresa_id: null
	}

	public showReporte = false;

	public empresas: Empresa[] = [];

	public intereses = [];

	public empresa = {
		id: null,
		nombre: null
	}

	filteredEmpresas: any;

	public show = null;

	public reportes = [];

	public disabled: boolean = false;

	public progressRef: NgProgressRef;

	public showProgress: boolean = false;

	constructor(private api: ApiBackRequestService, private router: Router, public ngProgress: NgProgress) {
		this.progressRef = ngProgress.ref();
	}

	ngOnInit(): void {
		this.fetch();
	}

	async fetch() {
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
		return val ? this.empresas.filter(s => s.nombre.toLowerCase().indexOf(val.toLowerCase()) != -1)
			: this.empresas;
	}

	displayFn(empresa): string {
		return empresa ? empresa.nombre : empresa;
	}

	links() {
		if (this.empresa.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por favor complete los campos requeridos')
		}
		else {
			this.disabled = true;
			this.form.campo = 'links';
			this.form.archivo = this.empresa.nombre + '-' + this.form.interes_id + '-LINKS-ENCUESTAS.xlsx';

			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.disabled = false;
					this.limpiar();
				},
				async (error) => {
					this.disabled = false;
					this.mensaje(error.error);
					this.limpiar();
				}
			);
		}
	}

	zip_intereses() {
		if (this.empresa.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por favor complete los campos requeridos')
		} else {
			this.showProgress = true;
			this.progressRef.start();

			this.disabled = true;
			this.form.campo = 'intereses';
			this.form.archivo = 'REPINTERESES-' + this.empresa.nombre + '-' + this.form.interes_id + '.zip';
			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.disabled = false;
					this.limpiar();
					this.progressRef.complete();
				},
				(error) => {
					this.disabled = false;
					this.mensaje(error.error);
					this.limpiar();
				}
			);
		}
	}

	excel() {
		if (this.empresa.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por favor complete los campos requeridos')
		} else {
			this.disabled = true;
			this.form.campo = 'status';
			this.form.archivo = this.empresa.nombre + '-' + this.form.interes_id + '-LINKS-ENCUESTAS-STATUS.xlsx';
			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.disabled = false;
					this.limpiar();
				},
				async (error) => {
					this.disabled = false;
					this.mensaje(error.error);
					this.limpiar();
				}
			);
		}
	}

	pdf() {
		if (this.empresa.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por favor complete los campos requeridos')
		} else {
			this.showProgress = true;
			this.progressRef.start();

			this.disabled = true;
			this.form.campo = 'pdf';
			this.form.archivo = 'REPCONSOLIDADO-' + this.empresa.nombre + '-' + this.form.interes_id + '.zip';
			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.disabled = false;
					this.limpiar();
					this.progressRef.complete();
				},
				(error) => {
					this.disabled = false;
					this.mensaje(error.error);
					this.limpiar();
				}
			);
		}
	}

	reporte() {
		this.form.campo = 'reportes';
		if (this.empresa.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por favor complete los campos requeridos')
		} else {
			this.disabled = true;
			this.api.post('exportar', this.form).subscribe(
				(data) => {
					this.showReporte = true;
					this.reportes = data[0];
					this.disabled = false;
					this.show = data.show;
				},
				(error) => {
					this.disabled = false;
					this.mensaje(error.error.error)
					this.limpiar();
				}
			);
		}
	}

	sede() {
		if (this.empresa.nombre == null) {
			this.mensaje('Por favor complete los campos requeridos')
		} else {
			this.showProgress = true;
			this.progressRef.start();
			this.disabled = true;
			this.form.campo = 'consolidado_sede';
			this.form.archivo = this.empresa.nombre + '-' + this.empresa.id + '.pdf';
			this.form.empresa_id = this.empresa.id;
			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.disabled = false;
					this.limpiar();
					this.progressRef.complete();
				},
				async (error) => {
					this.disabled = false;
					this.mensaje(error.error)
					this.limpiar();
				}
			);
		}
	}

	c_empresa() {
		console.log('empresa');
	}

	obtenerIntereses() {
		this.limpiar();
		this.intereses = [];
		this.api.get('links?tipo=1&sucursal=' + this.empresa.id).subscribe(
			(data) => {
				this.intereses = data
			}
		);
	}

	limpiar() {
		this.form.interes_id = null;
		this.form.archivo = null;
		this.form.campo = null;
		this.showProgress = false;
	}

	limpiarReportes() {
		this.reportes = [];
		this.show = null;
		this.showReporte = false;
		this.intereses = [];
	}

	mensaje(msj) {
		Swal.fire({
			title: msj,
			icon: 'warning',
			timer: 2000
		});
	}

	return() {
		this.router.navigateByUrl('/encuestas');
	}

	updateFilter(event) {
		const val = event.target.value;

		this.api.get('exportar?search=' + val + '&interes_id=' + this.form.interes_id).subscribe(
			(data) => {
				this.showReporte = true;
				this.reportes = data[0];
				this.show = data.show;
			}
		);
	}

	limpiarAutocomplete() {
		this.limpiar();
		this.limpiarReportes();
	}
}

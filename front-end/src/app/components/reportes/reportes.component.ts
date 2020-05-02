import { Router } from '@angular/router';
import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2';
import { HttpParams } from '@angular/common/http';

@Component({
	selector: 'app-reportes',
	templateUrl: './reportes.component.html',
	styleUrls: ['./reportes.component.css']
})
export class ReportesComponent implements OnInit {

	public form = {
		interes_id: null,
		temperamento_id: null,
		campo: null,
		archivo: null,
		hour: null,
	}

	public showReporte = false;

	public sucursales = [];

	public intereses = [];

	public temperamentos = [];

	public sucursal = {
		id: null,
		nombre: null
	}

	public reportes = [];

	public disabled: boolean = false;

	constructor(private api: ApiBackRequestService, private router: Router) { }

	ngOnInit(): void {
		this.fetch();
	}

	fetch() {
		this.api.get('empresa_sucursal').subscribe(
			(data) => {
				this.sucursales = data
			}
		);
	}

	links() {
		this.showReporte=false;
		if (this.sucursal.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por Favor Complete los campos requeridos')
		}
		else {
			this.disabled = true;
			this.form.campo = 'links';
			this.form.archivo = this.sucursal.nombre + '-LINKS-ENCUESTAS.xlsx';

			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.disabled = false;
					this.limpiar();
				},
				async (error) => {
					this.disabled = false;
					this.mensaje('No hay alumnos registrados en la Encuesta.')
					this.limpiar();
				}
			);
		}
	}

	zip_intereses() {
		this.showReporte=false;
		if (this.sucursal.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por Favor Complete los campos requeridos')
		} else {
			var d = new Date();
			this.form.hour = d.getDate() + '-' + d.getMonth() + '-' + d.getFullYear() + '-' + d.getHours() + '-' + d.getMinutes() + '-' + d.getSeconds();

			this.disabled = true;
			this.form.campo = 'intereses';
			this.form.archivo = this.sucursal.nombre + '-INTERESES.zip';
			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.eliminarZip();
				},
				(error) => {
					this.disabled = false;
					this.mensaje('No hay encuestas resueltas.')
					this.limpiar();
				}
			);
		}
	}

	excel() {
		this.showReporte=false;
		if (this.sucursal.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por Favor Complete los campos requeridos')
		} else {
			this.disabled = true;
			this.form.campo = 'status';
			this.form.archivo = this.sucursal.nombre + '-LINKS-ENCUESTAS-STATUS.xlsx';

			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.disabled = false;
					this.limpiar();
				},
				async (error) => {
					this.disabled = false;
					this.mensaje('No hay alumnos registrados en la Encuesta.')
					this.limpiar();
				}
			);
		}
	}

	pdf() {
		this.showReporte=false;
		if (this.sucursal.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por Favor Complete los campos requeridos')
		} else {
			var d = new Date();
			this.form.hour = d.getDate() + '-' + d.getMonth() + '-' + d.getFullYear() + '-' + d.getHours() + '-' + d.getMinutes() + '-' + d.getSeconds();

			this.disabled = true;
			this.form.campo = 'pdf';
			this.form.archivo = this.sucursal.nombre + '-REPORTES.zip';
			this.api.downloadFile('exportar', this.form).subscribe(
				(data) => {
					this.eliminarZip();
				},
				(error) => {
					this.disabled = false;
					this.mensaje('No hay encuestas resueltas.')
					this.limpiar();
				}
			);
		}
	}

	reporte(){
		this.showReporte=false;
		this.form.campo = 'reportes';
		if (this.sucursal.nombre == null || this.form.interes_id == null) {
			this.mensaje('Por Favor Complete los campos requeridos')
		} else {
			this.disabled = true;
			this.api.post('exportar', this.form).subscribe(
				(data) => {
					this.showReporte=true;
					this.reportes = data;
					this.disabled = false;
				},
				(error) => {
					this.disabled = false;
					this.mensaje(error)
					this.limpiar();
				}
			);
		}
	}

	eliminarZip() {

		this.api.delete('queues', this.form.hour).subscribe(
			(data) => {
				this.disabled = false;
				this.limpiar();
			}
		);
	}

	obtenerIntereses() {

		this.limpiar();
		this.intereses = [];
		this.api.get('links?tipo=1&sucursal=' + this.sucursal.id).subscribe(
			(data) => {
				this.intereses = data
			}
		);
	}

	obtenerTemperamentos() {

		this.temperamentos = [];

		let general_id;

		this.intereses.forEach(element => {
			if (element.id == this.form.interes_id) {
				general_id = element.encuesta_general_id;
			}
		});

		this.api.get('links?tipo=3&general_id=' + general_id).subscribe(
			(data) => {
				this.temperamentos = data
			}
		);
	}

	limpiar() {
		this.form.interes_id = null;
		this.form.temperamento_id = null;
		this.form.archivo = null;
		this.form.campo = null;
		this.temperamentos = [];
		this.form.hour = null;
		this.reportes = [];
	}

	mensaje(msj) {
		Swal.fire({
			title: msj,
			icon: 'warning',
			timer: 2000
		});
	}

	return() {
		this.router.navigateByUrl('/dashboard');
	}

}

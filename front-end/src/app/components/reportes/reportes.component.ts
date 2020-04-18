import { Router } from '@angular/router';
import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2';

@Component({
	selector: 'app-reportes',
	templateUrl: './reportes.component.html',
	styleUrls: ['./reportes.component.css']
})
export class ReportesComponent implements OnInit {

	public form = {
		encuesta_id: null,
		campo: 'links',
		archivo: null
	}

	public sucursales = [];

	public intereses = [];

	public sucursal = {
		id: null,
		nombre: null
	}

	constructor(private api: ApiBackRequestService, private router: Router) { }

	ngOnInit(): void {
		this.fetch();
	}

	async fetch() {
		await this.api.get('empresa_sucursal').toPromise().then(
			(data) => { this.sucursales = data }
		);
	}

	async obtenerIntereses() {
		this.intereses = [];

		await this.api.get('links?tipo=1&sucursal=' + this.sucursal.id).toPromise().then(
			(data) => { this.intereses = data }
		);
	}

	async guardar() {
		this.form.archivo = this.sucursal.nombre + '-LINKS-ENCUESTAS.xlsx';

		await this.api.downloadFile('exportar', this.form).toPromise().then(
			(data) => { },
			(error) => { this.mensaje('No hay alumnos registrados en el test de interés')}
		);
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

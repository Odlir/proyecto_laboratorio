import { RoutingStateService } from '../../../Services/routing/routing-state.service';
import { HttpParams } from '@angular/common/http';
import { TokenService } from '../../../Services/token/token.service';
import { ApiBackRequestService } from '../../../Services/api-back-request.service';
import { Component, OnInit, ViewChild } from '@angular/core';
import Swal from 'sweetalert2';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
	selector: 'app-importar-paciente',
	templateUrl: './importar-paciente.component.html',
	styleUrls: ['./importar-paciente.component.css']
})
export class ImportarPacienteComponent implements OnInit {

	@ViewChild('form') form;

	fileToUpload: File = null;
	public encuesta_id;

	public encuesta_general_id;

	previousUrl: string;


	constructor(private api: ApiBackRequestService, private user: TokenService, private activatedRoute: ActivatedRoute, private routingState: RoutingStateService, private router: Router) { }

	ngOnInit(): void {
		this.activatedRoute.queryParams.subscribe(async params => {
			this.encuesta_id = params.encuesta_id;
		});

		this.api.get('encuestas', this.encuesta_id).subscribe(
			(data) => {
				this.encuesta_general_id = data.encuesta_general_id
			},
			(error) => { }
		);

		this.previousUrl = this.routingState.getPreviousUrl();
	}

	error: {}

	handleFileInput(files: FileList) {
		this.fileToUpload = files.item(0);
	}

	guardar() {

		const formData: FormData = new FormData();
		formData.append('file', this.fileToUpload);
		formData.append('user_id', this.user.me());
		formData.append('encuesta_id', this.encuesta_general_id);
		formData.append('campo', 'persona');

		this.api.uploadFiles('importar', formData).subscribe(
			(data) => {
				this.mensaje('Importación Exitosa', 'success');
				this.return();
			},
			(error) => { this.cerrar(error.error) }
		);
	}

	descargarPlantilla() {
		let form = {
			campo: 'persona',
			archivo: 'importar-alumnos.xlsx'
		}

		this.api.downloadFile('exportar', form).subscribe(
			(data) => { },
		);
	}

	cerrar(error) {
		if (error.errors) {
			this.error = error.errors;
		} else {
			this.mensaje('Por favor debe usar la plantilla.', 'warning');
		}
		this.form.nativeElement.reset()
	}

	mensaje(msj, icon) {
		Swal.fire({
			title: msj,
			icon: icon,
			timer: 2000
		});
	}

	return() {
		if (this.previousUrl.includes('detalle')) {
			this.router.navigateByUrl('detalle-encuesta?id=' + this.encuesta_id + '&tab=1');
		}
		else {
			this.router.navigateByUrl('crud-encuesta?id=' + this.encuesta_id + '&tab=1');
		}
	}

}

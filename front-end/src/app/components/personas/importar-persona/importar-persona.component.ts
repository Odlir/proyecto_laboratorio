import { RoutingStateService } from './../../../Services/routing/routing-state.service';
import { HttpParams } from '@angular/common/http';
import { TokenService } from './../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit, ViewChild } from '@angular/core';
import Swal from 'sweetalert2';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
	selector: 'app-importar-persona',
	templateUrl: './importar-persona.component.html',
	styleUrls: ['./importar-persona.component.css']
})
export class ImportarPersonaComponent implements OnInit {

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
			(data) => { this.cerrar() },
			(error) => { this.cerrar(error.error.errors) }
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

	cerrar(error?) {
		if (error) {
			this.error = error;
			this.form.nativeElement.reset()
		}
		else {
			this.mensaje('Importación Exitosa');
			this.return();
		}
	}

	mensaje(msj) {
		Swal.fire({
			title: msj,
			icon: 'success',
			timer: 2000
		});

		this.router.navigateByUrl('/encuestas');
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

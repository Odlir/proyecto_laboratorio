import Swal from 'sweetalert2';
import { ColumnMode } from '@swimlane/ngx-datatable';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit, ViewChild, Input } from '@angular/core';

@Component({
	selector: 'app-alumnos',
	templateUrl: './alumnos.component.html',
	styleUrls: ['./alumnos.component.css']
})
export class AlumnosComponent implements OnInit {

	personas = [];

	loadingIndicator = true;
	reorderable = true;

	ColumnMode = ColumnMode;


	@Input() id: any;

	@Input() tab: any;

	constructor(private api: ApiBackRequestService) { }

	ngOnInit(): void {
		this.fetch();
	}

	async fetch() {
		await this.api.show('encuestas', this.id).toPromise().then(
			(data) => {
				this.personas = data.personas;
			}
		);
	}

	async updateFilter(event) {
		const val = event.target.value;

		await this.api.get('encuesta_persona?search=' + val + '&id=' + this.id).toPromise().then(
			(data) => {
				this.personas = data.personas;
				this.personas = [...this.personas]
			}
		);
	}

	eliminarPersona(id) {
		Swal.fire({
			title: 'Desea eliminar la persona?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirmar'
		}).then(async (result) => {
			if (result.value) {
				await this.api.delete('encuesta_persona', id).toPromise().then(
					(data) => {
						this.personas = data.personas;
						this.personas = [...this.personas]
					}
				);
			}
		})
	}

}

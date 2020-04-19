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

	fetch() {
		this.api.get('encuestas', this.id).subscribe(
			(data) => {
				this.personas = data.personas;
			}
		);
	}

	updateFilter(event) {
		const val = event.target.value;

		this.api.get('encuesta_persona?search=' + val + '&id=' + this.id).subscribe(
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
		}).then((result) => {
			if (result.value) {
				this.api.delete('encuesta_persona', id).subscribe(
					(data) => {
						this.personas = data.personas;
						this.personas = [...this.personas]
					}
				);
			}
		})
	}

}

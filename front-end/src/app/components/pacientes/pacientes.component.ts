import { ApiBackRequestService } from '../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ColumnMode } from '@swimlane/ngx-datatable';
import Swal from 'sweetalert2';

@Component({
	selector: 'app-pacientes',
	templateUrl: './pacientes.component.html',
	styleUrls: ['./pacientes.component.css']
})
export class PacientesComponent implements OnInit {
	rows = [];
	loadingIndicator = true;
	reorderable = true;

	offset = 0;
	paginate = 20;

	total = 0;

	ColumnMode = ColumnMode;

	search = '';

	ngOnInit(): void {
		this.fetch();
	}

	constructor(private api: ApiBackRequestService) {

	}

	fetch() {
		this.api.get('personas?search=' + this.search + '&offset=' + this.offset + '&paginate=' + this.paginate).subscribe(
			(data) => {
				this.rows = data;
			}
		);

		this.api.get('personas?search=' + this.search).subscribe(
			(data) => {
				this.total = data;
			}
		);
	}

	eliminar(id) {
		Swal.fire({
			title: 'Desea eliminar el registro?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirmar'
		}).then((result) => {
			if (result.value) {
				this.api.delete('personas', id).subscribe(
					(data) => {
						this.fetch();
					}
				);
			}
		});
	}

	updateFilter(event) {
		this.offset = 0;
		this.search = event.target.value;
		this.fetch();
	}

	nextPage(event) {
		this.offset = event.offset;
		this.fetch();
	}

}


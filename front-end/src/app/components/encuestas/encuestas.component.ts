import { Component, OnInit } from '@angular/core';
import { ColumnMode } from '@swimlane/ngx-datatable';
import Swal from 'sweetalert2';
import { ApiBackRequestService } from './../../Services/api-back-request.service';
import * as moment from 'moment';

@Component({
	selector: 'app-encuestas',
	templateUrl: './encuestas.component.html',
	styleUrls: ['./encuestas.component.css']
})
export class EncuestasComponent implements OnInit {

	rows = [];
	loadingIndicator = true;
	reorderable = true;

	offset = 0;
	paginate = 20;

	total = 0;

	ColumnMode = ColumnMode;

	search = '';

	constructor(private api: ApiBackRequestService) { }

	ngOnInit(): void {
		this.fetch();
	}

	nextPage(event) {
		this.offset = event.offset;
		this.fetch();
	}

	fetch() {
		this.api.get('encuestas?search=' + this.search + '&offset=' + this.offset + '&paginate=' + this.paginate).subscribe(
			(data) => {
				this.rows = data;
			}
		);

		this.api.get('encuestas?search=' + this.search).subscribe(
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
				this.api.delete('encuestas', id).subscribe(
					(data) => {
						this.fetch()
					}
				);
			}
		})
	}

	updateFilter(event) {
		this.offset = 0;
		this.search = event.target.value;
		this.fetch();
	}
}

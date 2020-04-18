import Swal from 'sweetalert2';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { ColumnMode } from '@swimlane/ngx-datatable';
import { Component, OnInit, Input } from '@angular/core';

@Component({
	selector: 'app-sucursal',
	templateUrl: './sucursal.component.html',
	styleUrls: ['./sucursal.component.css']
})
export class SucursalComponent implements OnInit {
	loadingIndicator = true;
	reorderable = true;

	ColumnMode = ColumnMode;

	@Input() id: any;

	@Input() tab: any;

	sucursales = [];

	constructor(private api: ApiBackRequestService) { }

	ngOnInit(): void {
		this.fetch();
	}

	async fetch() {
		await this.api.show('empresas', this.id).toPromise().then(
			(data) => { this.sucursales = data.sucursales }
		);
	}

	async updateFilter(event) {
		const val = event.target.value;

		await this.api.get('empresa_sucursal?search=' + val + '&id=' + this.id).toPromise().then(
			(data) => { this.sucursales = data; }
		);
	}

	eliminar(id) {
		Swal.fire({
			title: 'Desea eliminar la sucursal?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirmar'
		}).then(async (result) => {
			if (result.value) {
				await this.api.delete('empresa_sucursal', id).toPromise().then(
					(data) => {
						this.sucursales = data;
						this.sucursales = [...this.sucursales]
					}
				);
			}
		})
	}

}

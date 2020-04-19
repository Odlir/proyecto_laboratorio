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

	fetch() {
		this.api.get('empresas', this.id).subscribe(
			(data) => {
				this.sucursales = data.sucursales
			}
		);
	}

	updateFilter(event) {
		const val = event.target.value;

		this.api.get('empresa_sucursal?search=' + val + '&id=' + this.id).subscribe(
			(data) => {
				this.sucursales = data;
			}
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
		}).then((result) => {
			if (result.value) {
				this.api.delete('empresa_sucursal', id).subscribe(
					(data) => {
						this.sucursales = data;
						this.sucursales = [...this.sucursales]
					}
				);
			}
		})
	}

}

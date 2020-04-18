import { RoutingStateService } from './../../../Services/routing/routing-state.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
	selector: 'app-detalle-sucursal',
	templateUrl: './detalle-sucursal.component.html',
	styleUrls: ['./detalle-sucursal.component.css']
})
export class DetalleSucursalComponent implements OnInit {

	form = {
		id: null,
		nombre: null,
		insert_user_id: null,
		edit_user_id: null,
		empresa_id: null,
		insert: { name: null },
		edit: { name: '' },
		created_at: null,
		updated_at: null,
	}

	empresa = {
		razon_social: null
	}

	previousUrl: string;

	constructor(private api: ApiBackRequestService, private router: Router, private activatedRoute: ActivatedRoute, private routingState: RoutingStateService) { }

	ngOnInit(): void {
		this.activatedRoute.queryParams.subscribe(async params => {
			const id = params.id;
			if (id != null) {
				this.cargar(id);
			}
		});

		this.previousUrl = this.routingState.getPreviousUrl();
	}

	async cargar(id) {
		await this.api.show('empresa_sucursal', id).toPromise().then(
			(data) => { this.form = data }
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
		}).then(async (result) => {
			if (result.value) {
				await this.api.delete('empresa_sucursal', id).toPromise().then(
					(data) => { this.returnCrud(); }
				);
			}
		})
	}

	returnCrud() {
		if (this.previousUrl.includes('detalle')) {
			this.router.navigateByUrl('detalle-empresa?id=' + this.form.empresa_id + '&tab=1');
		}
		else {
			this.router.navigateByUrl('crud-empresa?id=' + this.form.empresa_id + '&tab=1');
		}
	}
}

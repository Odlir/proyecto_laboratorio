import { HttpParams } from '@angular/common/http';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-detalle-empresa',
  templateUrl: './detalle-empresa.component.html',
  styleUrls: ['./detalle-empresa.component.css']
})
export class DetalleEmpresaComponent implements OnInit {

	public form = {
		id:null,
    codigo: null,
    razon_social: null,
    contacto: null,
		email: null,
		telefono: null,
    insert_user_id: null,
    edit_user_id: null,
    insert: {name: null},
    edit: {name: ''},
    created_at: null,
		updated_at: null,
		sucursales : []
	};

	public id: HttpParams

  constructor(private api: ApiBackRequestService, private router: Router, private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
		this.activatedRoute.queryParams.subscribe(async params => {
      this.id = params.id;
      if (this.id != null) {
        this.cargar(this.id);
			}
		});
	}

	async cargar(id)
  {
    await this.api.show('empresas', id).toPromise().then(
      (data) => {this.form = data}
    );
	}

	eliminar(id)
  {
    Swal.fire({
      title: 'Desea eliminar el registro?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmar'
    }).then(async (result) => {
      if (result.value) {
        await this.api.delete('empresas', id).toPromise().then(
          (data) => {this.router.navigateByUrl('/empresas');}
        );
      }
    })
	}
}

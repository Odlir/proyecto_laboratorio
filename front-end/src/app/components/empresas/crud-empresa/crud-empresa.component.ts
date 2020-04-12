import { ColumnMode } from '@swimlane/ngx-datatable';
import { SharedVarService } from './../../../Services/shared/shared-var.service';
import { HttpParams } from '@angular/common/http';
import Swal from 'sweetalert2';
import { Router, ActivatedRoute } from '@angular/router';
import { TokenService } from '../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-crud-empresa',
  templateUrl: './crud-empresa.component.html',
  styleUrls: ['./crud-empresa.component.css']
})
export class CrudEmpresaComponent implements OnInit {

	loadingIndicator = true;
	reorderable = true;

	ColumnMode = ColumnMode;

	public form = {
		codigo: null,
		razon_social: null,
		contacto: null,
		email: null,
		telefono: null,
		insert_user_id: this.user.me(),
		edit_user_id: null,
		insert: {name: null},
		edit: {name: ''},
		created_at: null,
		updated_at: null,
		sucursales : []
	};

	public tabSelected = 0;

	public titulo= "CREAR EMPRESA";

  public id: HttpParams;

  constructor(
    private api: ApiBackRequestService,
    private user: TokenService,
    private router: Router,
	private activatedRoute: ActivatedRoute
	) {

	}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe(async params => {
        this.id = params.id;
        if (this.id != null) {
          this.cargarEditar();
				}

				this.tabSelected = params.tab;
		});
	}

  async cargarEditar()
  {
		this.titulo = "EDITAR EMPRESA";
    await this.api.show('empresas', this.id).toPromise().then(
      (data) => {this.form = data}
    );
  }

  guardar()
  {
    if(this.id)
    {
      this.editar();
    }
    else
    {
      this.registrar();
    }
  }

  async registrar()
  {
    await this.api.post('empresas', this.form).toPromise().then(
      (data) => {this.cerrar('Registro Exitoso')}
    );
  }

  async editar()
  {	this.form.edit_user_id = this.user.me();
    await this.api.put('empresas', this.id , this.form).toPromise().then(
      (data) => {this.cerrar('Datos Actualizados Correctamente')}
    );
  }

  cerrar(mensaje)
  {
    Swal.fire({
      title: mensaje,
      icon: 'success',
      showClass: {
        popup: 'animated fadeInDown faster'
      },
      hideClass: {
        popup: 'animated fadeOutUp faster'
      }
    });
    this.router.navigateByUrl('/empresas');
	}

	eliminarSucursal(id)
	{
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
						this.form.sucursales=data;
						this.form.sucursales = [...this.form.sucursales]
					}
				);
			}
		})
	}

	async updateFilter(event) {
    const val = event.target.value;

    await this.api.get('empresa_sucursal?search=' + val +'&id='+this.id).toPromise().then(
      (data) => {this.handle(data)}
    );
	}

	handle(data)
  {
    this.form.sucursales = data;
  }
}


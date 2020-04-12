import { SharedVarService } from './../../../Services/shared/shared-var.service';
import { ModalSucursalComponent } from './../modal-sucursal/modal-sucursal.component';
import { HttpParams } from '@angular/common/http';
import Swal from 'sweetalert2';
import { Router, ActivatedRoute } from '@angular/router';
import { TokenService } from '../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit} from '@angular/core';
import { BsModalService, BsModalRef } from 'ngx-bootstrap/modal';

@Component({
  selector: 'app-crud-empresa',
  templateUrl: './crud-empresa.component.html',
  styleUrls: ['./crud-empresa.component.css']
})
export class CrudEmpresaComponent implements OnInit {

	bsModalRef: BsModalRef;

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

	sucursal = {
		codigo: null,
		nombre: null,
		direccion: null,
		telefono :null,
		pais_id: null,
		ciudad_id: null,
		pais: {name:''},
		ciudad: {name: ''},
		insert_user_id: this.user.me(),
    	edit_user_id: null,
	}

  public id: HttpParams;

  constructor(
    private api: ApiBackRequestService,
    private user: TokenService,
    private router: Router,
		private activatedRoute: ActivatedRoute,
		private modalService: BsModalService,
		private sharedService: SharedVarService
	) {
		this.sharedService.getSucursal()
		.subscribe(sucursal => this.anadirSucursal(sucursal))
		}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe(async params => {
        this.id = params.id;
        if (this.id != null) {
          this.cargarEditar();
        }
		});
	}

	anadirSucursal(sucursal)
	{
		this.limpiarSucursal();
		this.sucursal=sucursal;
		this.sucursal.insert_user_id= this.user.me(),
		this.form.sucursales.push(this.sucursal);
	}

	limpiarSucursal()
	{
		this.sucursal = {
			codigo: null,
			nombre: null,
			direccion: null,
			telefono :null,
			pais_id: null,
			ciudad_id: null,
			pais: {name:''},
			ciudad: {name: ''},
			insert_user_id: this.user.me(),
			edit_user_id: null,
		};
	}


	openSucursal()
	{
		this.bsModalRef = this.modalService.show(ModalSucursalComponent);
	}


  async cargarEditar()
  {
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
  {
		this.form.sucursales.forEach(element => {
			element.edit_user_id = this.user.me();
		});
		this.form.edit_user_id = this.user.me();

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

	eliminarSucursal(index)
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
					this.form.sucursales.splice(index, 1);
				}
			})
	}
}


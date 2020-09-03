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
    id: null,
		nro_ruc: null,
		razon_social: null,
		pag_web: null,
		direccion: null,
		telf_fijo: null,
		nro_celular: null,
		nombre_contacto1: null,
		telf_fijo1: null,
		nro_celular1: null,
		email_contacto1: null,
		nombre_contacto2: null,
		telf_fijo2: null,
		nro_celular2: null,
		email_contacto2: null,
		nombre_banco: null,
		nro_cta: null,
		nro_cta_interbancaria: null,
		observaciones: null,
    estado: null,
    ubigeo_id: null,
    
    insert_user_id: null,
    edit_user_id: null,
    insert: { name: null },
    edit: { name: '' },
    created_at: null,
    updated_at: null,
    sucursales: []
  };

  public tabSelected = 0;

  public id: HttpParams

  constructor(private api: ApiBackRequestService, private router: Router, private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe(async params => {
      this.id = params.id;
      this.tabSelected = params.tab;
      if (this.id != null) {
        this.cargar(this.id);
      }
    });
  }

  cargar(id) {
    this.api.get('empresas', id).subscribe(
      (data) => {
        this.form = data
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
        this.api.delete('empresas', id).subscribe(
          (data) => {
            this.router.navigateByUrl('/empresas');
          }
        );
      }
    })
  }
}

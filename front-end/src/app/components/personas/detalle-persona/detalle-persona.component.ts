import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-detalle-persona',
  templateUrl: './detalle-persona.component.html',
  styleUrls: ['./detalle-persona.component.css']
})
export class DetallePersonaComponent implements OnInit {

  public form = {
    id: null,
    nombres: null,
    apellido_materno: null,
    apellido_paterno: null,
    sexo: null,
    email: null,
    insert_user_id: null,
    edit_user_id: null,
    insert: {name: null},
    edit: {name: ''},
    created_at: null,
    updated_at: null
  };

  constructor(private api: ApiBackRequestService, private router: Router, private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe(async params => {
      const id = params.id;
      if (id != null) {
        this.cargar(id);
      }
  });
  }

  async cargar(id)
  {
    await this.api.show('personas', id).toPromise().then(
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
        await this.api.delete('personas', id).toPromise().then(
          (data) => {this.router.navigateByUrl('/personas');}
        );
      }
    })
  }

}

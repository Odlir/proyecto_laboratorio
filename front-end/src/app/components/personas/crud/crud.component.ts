import Swal from 'sweetalert2';
import { Router } from '@angular/router';
import { TokenService } from './../../../Services/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-crud',
  templateUrl: './crud.component.html',
  styleUrls: ['./crud.component.css']
})
export class CrudComponent implements OnInit {

  public form = {
    nombres: null,
    apellido_materno: null,
    apellido_paterno: null,
    sexo: null,
    email: null,
    insert_user_id: this.user.me()
  };


  constructor(
    private api: ApiBackRequestService,
    private user: TokenService,
    private router: Router) { }

  ngOnInit(): void {

  }

  async registrar()
  {
    await this.api.post('personas', this.form).toPromise().then(
      (data) => {this.cerrar()}
    );
  }

  cerrar()
  {
    Swal.fire({
      title: 'Registro Exitoso',
      icon: 'success',
      showClass: {
        popup: 'animated fadeInDown faster'
      },
      hideClass: {
        popup: 'animated fadeOutUp faster'
      }
    });
    this.router.navigateByUrl('/dashboard');
  }

}

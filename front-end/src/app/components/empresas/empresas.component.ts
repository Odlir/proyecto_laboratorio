import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ColumnMode } from '@swimlane/ngx-datatable';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-empresas',
  templateUrl: './empresas.component.html',
  styleUrls: ['./empresas.component.css']
})
export class EmpresasComponent implements OnInit {

  rows = [];
  loadingIndicator = true;
  reorderable = true;

  ColumnMode = ColumnMode;

  ngOnInit(): void {
    this.fetch();
  }

  constructor(private api: ApiBackRequestService) {

  }

  async fetch()
  {
    await this.api.get('empresas').toPromise().then(
      (data) => {this.handle(data)}
    );
  }

  handle(data)
  {
    this.rows = data;
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
          (data) => {this.fetch()}
        );
      }
    })
  }

	async updateFilter(event) {
    const val = event.target.value;

    await this.api.get('empresas?search=' + val).toPromise().then(
      (data) => {this.handle(data)}
    );
  }
}

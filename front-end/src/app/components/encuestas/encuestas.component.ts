import { Component, OnInit } from '@angular/core';
import { ColumnMode } from '@swimlane/ngx-datatable';
import Swal from 'sweetalert2';
import { ApiBackRequestService } from './../../Services/api-back-request.service';
import * as moment from 'moment';

@Component({
  selector: 'app-encuestas',
  templateUrl: './encuestas.component.html',
  styleUrls: ['./encuestas.component.css']
})
export class EncuestasComponent implements OnInit {

	rows = [];
  loadingIndicator = true;
  reorderable = true;

	ColumnMode = ColumnMode;

  constructor(private api: ApiBackRequestService) { }

  ngOnInit(): void {
		this.fetch();
	}

	async fetch()
  {
    await this.api.get('encuestas').toPromise().then(
      (data) => {this.handle(data)}
    );
	}

	handle(data)
  {
		data.forEach(element => {
			element.fecha_inicio= moment(element.fecha_inicio).format('DD/MM/YYYY')
			element.fecha_fin= moment(element.fecha_fin).format('DD/MM/YYYY')
		});
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
        await this.api.delete('encuestas', id).toPromise().then(
          (data) => {this.fetch()}
        );
      }
    })
	}

	async updateFilter(event) {
    const val = event.target.value;

    await this.api.get('encuestas?search=' + val).toPromise().then(
      (data) => {this.handle(data)}
    );
  }

}

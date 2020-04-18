import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ColumnMode } from '@swimlane/ngx-datatable';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-personas',
  templateUrl: './personas.component.html',
  styleUrls: ['./personas.component.css']
})
export class PersonasComponent implements OnInit {
  rows = [];
  loadingIndicator = true;
  reorderable = true;

  ColumnMode = ColumnMode;

  ngOnInit(): void {
    this.fetch();
  }

  constructor(private api: ApiBackRequestService) {

  }

  fetch() {
    this.api.get('personas').subscribe(
      (data) => {
        this.handle(data)
        }
      );
  }

  handle(data) {
    this.rows = data;
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
        this.api.delete('personas', id).subscribe(
          (data) => {
            this.fetch()
            }
          );
      }
    })
  }

  updateFilter(event) {
    const val = event.target.value;

    this.api.get('personas?search=' + val).subscribe(
      (data) => {
        this.handle(data)
        }
      );
  }

}


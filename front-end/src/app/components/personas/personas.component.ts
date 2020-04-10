import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { ColumnMode } from '@swimlane/ngx-datatable';

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

  async fetch()
  {
    await this.api.get('personas').toPromise().then(
      (data) => {this.handle(data)}
    );
  }

  handle(data)
  {
    this.rows = data;
  }

}


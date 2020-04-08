import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-personas',
  templateUrl: './personas.component.html',
  styleUrls: ['./personas.component.css']
})
export class PersonasComponent implements OnInit {

  constructor(private api: ApiBackRequestService) { }

  ngOnInit(): void {
    this.api.get('users').subscribe(
      data => console.log(data),
      error => console.log(error)
    );
  }

}


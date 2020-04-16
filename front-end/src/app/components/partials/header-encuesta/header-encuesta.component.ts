import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-header-encuesta',
  templateUrl: './header-encuesta.component.html',
  styleUrls: ['./header-encuesta.component.css']
})
export class HeaderEncuestaComponent implements OnInit {

	@Input() nombre: string;
	@Input() icono: string;
	@Input() alumno: string;

  constructor() { }

  ngOnInit(): void {
  }

}

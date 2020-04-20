import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-header-encuesta',
  templateUrl: './header-encuesta.component.html',
  styleUrls: ['./header-encuesta.component.css']
})
export class HeaderEncuestaComponent implements OnInit {

  @Input() encuesta: string;
  @Input() icono: string;
  @Input() alumno: string;
  @Input() id: string;
  @Input() sucursal: string;

  constructor() { }

  ngOnInit(): void {
  }

}

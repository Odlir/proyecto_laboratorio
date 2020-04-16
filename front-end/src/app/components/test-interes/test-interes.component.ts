import { HttpParams } from '@angular/common/http';
import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-test-interes',
  templateUrl: './test-interes.component.html',
  styleUrls: ['./test-interes.component.css']
})
export class TestInteresComponent implements OnInit {

	preguntas = [];

	subpreguntas = [];

	respuestas = [];

	encuestas = [];

	subencuesta = {
		pregunta_id : null,
		subpregunta_id :null,
		respuesta_id :null
	}

	subencuestas=[

	]

  constructor(private api: ApiBackRequestService) { }

  ngOnInit(): void {

		this.fetch();
	}

	async fetch()
	{
		await this.api.show('preguntas', 1).toPromise().then(
      (data) => {this.preguntas=data}
		);

		await this.api.show('subpreguntas', 1).toPromise().then(
      (data) => {this.subpreguntas=data;}
		);

		await this.api.show('respuestas', 1).toPromise().then(
      (data) => {this.respuestas=data;}
    );
	}

	guardar()
	{
		console.log(this.encuestas);
	}

	select(index_preg,index_sub,pregunta_id,subpregunta_id,respuesta_id)
	{
		this.subencuesta.pregunta_id= pregunta_id;
		this.subencuesta.subpregunta_id= subpregunta_id;
		this.subencuesta.respuesta_id= respuesta_id;

		this.subencuestas[index_sub]= JSON.parse(JSON.stringify(this.subencuesta));

		this.encuestas[index_preg]= JSON.parse(JSON.stringify( this.subencuestas));

		this.limpiar();

		console.log(this.encuestas);
	}

	limpiar()
	{
		this.subencuesta = {
			pregunta_id : null,
			subpregunta_id :null,
			respuesta_id :null
		}
	}

}

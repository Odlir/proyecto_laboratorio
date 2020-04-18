import { ApiBackRequestService } from './../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormArray, FormControl } from '@angular/forms'
import { ActivatedRoute } from '@angular/router';

@Component({
	selector: 'app-test-interes',
	templateUrl: './test-interes.component.html',
	styleUrls: ['./test-interes.component.css']
})
export class TestInteresComponent implements OnInit {

	preguntas = [];

	subpreguntas = [];

	form = {
		pregunta_id: null,
		subpregunta_id: null,
		respuesta_id: null,
		encuesta_id: null,
		persona_id: null
	}

	respuestas1 = [];

	respuestas2 = [];

	data = [];

	FormGroup: FormGroup;

	constructor(private api: ApiBackRequestService, public formBuilder: FormBuilder,private activatedRoute: ActivatedRoute) {

	}

	ngOnInit(): void {

		this.fetch();

		this.activatedRoute.queryParams.subscribe(async params => {
			this.form.encuesta_id = params.encuesta_id;
			this.form.persona_id = params.persona_id;
		  });
	}

	reactive(preguntas) {
		this.FormGroup = this.formBuilder.group({
			preguntas: ['']
		});

		const preguntasMethodsControl = <FormArray>this.FormGroup.controls['productMethod'];
		// creating radio button control for each item.
		for (let i = 0; i < preguntas.length; i++) {
			preguntasMethodsControl.push(new FormControl());
		}

		console.log(this.FormGroup);
	}

	async fetch() {
		await this.api.show('preguntas', 1).toPromise().then(
			(data) => { this.preguntas = data }
		);

		await this.api.show('subpreguntas', 1).toPromise().then(
			(data) => { this.subpreguntas = data; }
		);

		await this.api.get('respuestas?encuesta=1&sub=1').toPromise().then(
			(data) => { this.respuestas1 = data; }
		);

		await this.api.get('respuestas?encuesta=1&sub=2').toPromise().then(
			(data) => { this.respuestas2 = data; }
		);

		this.subpreguntas.forEach(element => {
			if (element.tipo_subpregunta == '1') {
				element.respuestas = JSON.parse(JSON.stringify(this.respuestas1));
			}
			else {
				element.respuestas = JSON.parse(JSON.stringify(this.respuestas2));
			}
			element.respuesta_id = null;
		});

		this.preguntas.forEach(element => {
			element.subpreguntas = JSON.parse(JSON.stringify(this.subpreguntas));
		});

		this.reactive(this.preguntas);
	}

	async guardar() {
		this.preguntas.forEach(preg => {
			preg.subpreguntas.forEach(async sub => {
				this.form.pregunta_id = preg.id;
				this.form.subpregunta_id = sub.id;
				this.form.respuesta_id = sub.respuesta_id;

				this.data.push(this.form);

				this.limpiar()
			});
		});

		await this.api.post('encuesta_persona', this.data).toPromise().then(
			(data) => {

			}
		);
	}

	limpiar() {
		this.form = {
			pregunta_id: null,
			subpregunta_id: null,
			respuesta_id: null,
			encuesta_id: null,
			persona_id: null
		}
	}
}

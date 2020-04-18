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

	public sucursal = null;

	public alumno = null;

	constructor(private api: ApiBackRequestService, public formBuilder: FormBuilder, private activatedRoute: ActivatedRoute) {

	}

	ngOnInit(): void {
		this.activatedRoute.queryParams.subscribe(async params => {
			this.form.encuesta_id = params.encuesta_id;
			this.form.persona_id = params.persona_id;
		});

		this.fetch();

		this.obtenerDatos();
	}

	obtenerDatos() {
		this.api.get('encuestas', this.form.encuesta_id).subscribe(
			(data) => {
				this.sucursal = data.empresa.nombre;

				data.personas.filter(obj => {
					if (obj.id == this.form.persona_id) {
						this.alumno = obj.nombrecompleto;
					}
				})
			}
		);
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

	fetch() {
		this.api.get('preguntas', 1).subscribe(
			(data) => {
				this.preguntas = data
			}
		);

		this.api.get('subpreguntas', 1).subscribe(
			(data) => {
				this.subpreguntas = data;
			}
		);

		this.api.get('respuestas?encuesta=1&sub=1').subscribe(
			(data) => {
				this.respuestas1 = data;
			}
		);

		this.api.get('respuestas?encuesta=1&sub=2').subscribe(
			(data) => {
				this.respuestas2 = data;
			}
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

	guardar() {
		this.preguntas.forEach(preg => {
			preg.subpreguntas.forEach(sub => {
				this.form.pregunta_id = preg.id;
				this.form.subpregunta_id = sub.id;
				this.form.respuesta_id = sub.respuesta_id;

				this.data.push(this.form);

				this.limpiar()
			});
		});

		this.api.post('encuesta_persona', this.data).subscribe(
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

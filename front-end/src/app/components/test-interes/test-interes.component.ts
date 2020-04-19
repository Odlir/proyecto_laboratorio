import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { ApiBackRequestService } from './../../Services/api-back-request.service';
import Swal from 'sweetalert2';
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
	};

	respuestas1 = [];
	respuestas2 = [];
	data = [];
	formGroup: FormGroup;
	group: any = {};

	public sucursal = null;

	public alumno = null;

	constructor(private api: ApiBackRequestService, public formBuilder: FormBuilder, private route: ActivatedRoute) {
		this.formGroup = new FormGroup(this.group);
	}

	ngOnInit(): void {

		this.form.encuesta_id = parseInt(this.route.snapshot.params.encuesta_id)
		this.form.persona_id = parseInt(this.route.snapshot.params.persona_id);

		this.obtenerDatos();

		this.fetch();
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
		preguntas.forEach((pr, index) => {
			pr.subpreguntas.forEach((p, i) => {
				let ind = `${index}-${i}`;
				this.group[ind] = new FormControl('', [Validators.required])
			})
		});
	}

	async fetch() {
		await this.api.show('preguntas', 1).toPromise().then(
			(data) => {
				this.preguntas = data;
			}
		);

		await this.api.show('subpreguntas', 1).toPromise().then(
			(data) => {
				this.subpreguntas = data;
			}
		);

		await this.api.get('respuestas?encuesta=1&sub=1').toPromise().then(
			(data) => {
				this.respuestas1 = data;
			}
		);

		await this.api.get('respuestas?encuesta=1&sub=2').toPromise().then(
			(data) => {
				this.respuestas2 = data;
			}
		);

		this.subpreguntas.forEach(element => {
			if (element.tipo_subpregunta == '1') {
				element.respuestas = JSON.parse(JSON.stringify(this.respuestas1));
			} else {
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
		console.log('form', this.formGroup);
		Object.values(this.formGroup.controls).forEach(a => {
			//console.log('a', a.status);
			if (a.status == 'INVALID') {
				Swal.fire('Hello world!');
			}
		});

		return false;

		//this.formGroup.controls
		/*this.preguntas.forEach(preg => {
			preg.subpreguntas.forEach(async sub => {
				this.form.pregunta_id = preg.id;
				this.form.subpregunta_id = sub.id;
				this.form.respuesta_id = sub.respuesta_id;

				this.data.push(this.form);

				this.limpiar();
			});
		});

		await this.api.post('encuesta_persona', this.data).toPromise().then(
			(data) => {

			}
		);*/
	}

	limpiar() {
		this.form = {
			pregunta_id: null,
			subpregunta_id: null,
			respuesta_id: null,
			encuesta_id: null,
			persona_id: null
		};
	}
}

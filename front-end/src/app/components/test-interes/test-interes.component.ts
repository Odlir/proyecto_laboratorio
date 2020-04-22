import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { ApiBackRequestService } from './../../Services/api-back-request.service';
import Swal from 'sweetalert2';
import { ActivatedRoute } from '@angular/router';
import * as moment from 'moment';

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
		persona_id: null,
	};

	respuestas1 = [];
	respuestas2 = [];
	data = [];
	formGroup: FormGroup;
	group: any = {};

	public sucursal = null;

	public alumno = null;

	public save: boolean = null;

	public show: boolean = true;

	public rango: boolean = false;

	constructor(private api: ApiBackRequestService, public formBuilder: FormBuilder, private route: ActivatedRoute) {
		this.formGroup = new FormGroup(this.group);
	}

	ngOnInit(): void {

		this.form.encuesta_id = parseInt(this.route.snapshot.params.encuesta_id)
		this.form.persona_id = parseInt(this.route.snapshot.params.persona_id);

		this.obtenerDatos();
	}

	obtenerDatos() {
		this.api.get('encuestas', this.form.encuesta_id).subscribe(
			(data) => {

				if (moment(new Date()).format('YYYY-MM-DD') < data.fecha_inicio) {
					this.show = false;
					this.rango = true;
				}

				if (moment(new Date()).format('YYYY-MM-DD') > data.fecha_fin) {
					this.show = false;
					this.rango = true;
				}

				this.sucursal = data.empresa.nombre;

				data.general.personas.filter(obj => {
					if (obj.id == this.form.persona_id) {
						this.alumno = obj.nombrecompleto;
					}
				})
			}
		);

		if (this.show) {
			this.api.post('respuestas', this.form).subscribe(
				(data) => {
					if (Object.keys(data).length === 0) {
						this.fetch();
					}
					else {
						this.show = false;
					}
				}
			);
		}
	}

	reactive(preguntas) {
		preguntas.forEach((pr) => {
			pr.subpreguntas.forEach((s) => {
				let ind = `${pr.id}-${s.id}`;
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

		Object.entries(this.formGroup.controls).every(a => {
			if (a[1].value == '') {
				Swal.fire({
					title: 'El Test debe ser completado al 100%.',
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
				});
				this.data = [];
				this.save = false;
				return false;
			}
			else {

				let ids = a[0].split('-');
				this.form.pregunta_id = ids[0];
				this.form.subpregunta_id = ids[1];
				this.form.respuesta_id = a[1].value;

				this.data.push({ ...this.form });

				this.save = true;
				return true;
			}
		});

		if (this.save) {
			this.api.post('encuesta_persona', this.data).subscribe(
				(data) => {
					Swal.fire({
						title: 'Test Enviado Correctamente.',
						icon: 'success',
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
					});

					this.show = false;
				},
				(error) => {

				}
			);
		}
	}
}

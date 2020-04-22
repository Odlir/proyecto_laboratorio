import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { ApiBackRequestService } from 'src/app/Services/api-back-request.service';
import { ActivatedRoute } from '@angular/router';
import Swal from 'sweetalert2';
import * as moment from 'moment';

@Component({
	selector: 'app-test-temperamentos',
	templateUrl: './test-temperamentos.component.html',
	styleUrls: ['./test-temperamentos.component.css']
})
export class TestTemperamentosComponent implements OnInit {

	preguntas = [];

	form = {
		pregunta_id: null,
		respuesta_id: null,
		encuesta_id: null,
		persona_id: null
	};

	respuestas = [];

	data = [];
	formGroup: FormGroup;
	group: any = {};

	public sucursal = null;

	public alumno = null;

	public save: boolean = null;

	public show: boolean = true;

	public rango: boolean = false;

	// public progreso = 0;

	constructor(private api: ApiBackRequestService, public formBuilder: FormBuilder, private route: ActivatedRoute) {
		this.formGroup = new FormGroup(this.group);
	}

	ngOnInit(): void {
		this.form.encuesta_id = parseInt(this.route.snapshot.params.encuesta_id)
		this.form.persona_id = parseInt(this.route.snapshot.params.persona_id);

		this.obtenerDatos();

		console.log(this.formGroup.controls);
	}

	// async progress() {
	// 	this.progreso = 0;
	// 	await Object.entries(this.formGroup.controls).every(a => {
	// 		// if (a[1].value === "") {
	// 		// 	console.log('vacio');
	// 		// 	return false;
	// 		// }
	// 		// else {
	// 		// 	console.log('lleno');
	// 		// 	this.progreso++;
	// 		// 	return true;			
	// 		// }
	// 		if (a[1].value != "") {
	// 			console.log('lleno',a[1].value);
	// 			this.progreso++;
	// 			return true;
	// 		}
	// 		else {
	// 			console.log('vacio',a[1]);
	// 			return false;
	// 		}
	// 		// console.log(a[1].value);
	// 		// return false;
	// 	});

	// 	console.log(this.progreso);
	// }

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
			let ind = `${pr.id}`;
			this.group[ind] = new FormControl('', [Validators.required])
		});
	}

	async fetch() {
		await this.api.show('preguntas', 3).toPromise().then(
			(data) => {
				this.preguntas = data;
			}
		);

		await this.api.show('respuestas', 3).toPromise().then(
			(data) => {
				this.respuestas = data;
			}
		);

		this.preguntas.forEach(element => {
			element.respuestas = JSON.parse(JSON.stringify(this.respuestas));
			element.respuesta_id = null;
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
				this.form.pregunta_id = a[0];
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

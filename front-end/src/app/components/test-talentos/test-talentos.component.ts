import {Component, OnInit} from '@angular/core';
import {CdkDragDrop, moveItemInArray, transferArrayItem} from '@angular/cdk/drag-drop';
import {NgbCarouselConfig} from '@ng-bootstrap/ng-bootstrap';
import {ApiBackRequestService} from '../../Services/api-back-request.service';
import {ActivatedRoute, Router} from '@angular/router';
import {SharedVarService} from '../../Services/shared/shared-var.service';
import * as moment from 'moment';
import Swal from "sweetalert2";

@Component({
	selector: 'app-test-talentos',
	templateUrl: './test-talentos.component.html',
	styleUrls: ['./test-talentos.component.css']
})
export class TestTalentosComponent implements OnInit {

	public sucursal: string = '';
	public alumno: string = '';
	form = {
		pregunta_id: null,
		respuesta_id: null,
		encuesta_id: null,
		persona_id: null
	};
	images = [];
	list2 = [];
	list3 = [];
	list4 = [];
	con: any;
	path:string = '../../../assets/talentos/front/';
	encuesta = {
		encuesta_id: null,
		persona_id: null,
	}
	public show: boolean = true;
	public rango: boolean = false;
	public mensaje: string = '';
	public titulo: string = '';

	constructor(config: NgbCarouselConfig,
				private api: ApiBackRequestService,
				private router: Router,
				private sharedService: SharedVarService,
				private route: ActivatedRoute) {
		config.showNavigationIndicators = false;
		config.interval = 0;
	}

	ngOnInit(): void {
		this.getData();
		this.encuesta.encuesta_id = parseInt(this.route.snapshot.params.encuesta_id)
		this.encuesta.persona_id = parseInt(this.route.snapshot.params.persona_id);
		this.localStore(this.route.snapshot.params.encuesta_id, this.route.snapshot.params.persona_id);
		this.obtenerDatos();
	}

	obtenerDatos() {
		this.api.get('encuesta_puntaje?encuesta_id=' + this.encuesta.encuesta_id + '&persona_id=' + this.encuesta.persona_id).subscribe(
			(data) => {
				if (data.length != 0) {
					this.show = false;
					this.titulo = 'FELICITACIONES'
					this.mensaje = 'El test fue completado correctamente.'
				}else {
					this.api.get('encuestas', this.encuesta.encuesta_id).subscribe(
						(data) => {
							if (moment(new Date()).format('YYYY-MM-DD') < data.fecha_inicio) {
								this.show = false;
								this.rango = true;
								this.titulo = 'ENCUESTA FUERA DE RANGO'
								this.mensaje = 'Gracias por participar.'
							}
							if (moment(new Date()).format('YYYY-MM-DD') > data.fecha_fin) {
								this.show = false;
								this.rango = true;
								this.titulo = 'ENCUESTA FUERA DE RANGO'
								this.mensaje = 'Gracias por participar.'
							}
							this.sucursal = data.empresa.nombre;
							data.general.personas.filter(obj => {
								if (obj.id == this.encuesta.persona_id) {
									this.alumno = obj.nombrecompleto;
								}
							})
						}
					);
				}
			}
		);

	}

	drop(event: CdkDragDrop<any>) {
		if (event.previousContainer === event.container) {
			moveItemInArray(event.container.data, event.previousIndex, event.currentIndex);
		} else {
			transferArrayItem(event.previousContainer.data,
				event.container.data,
				event.currentIndex,
				event.currentIndex);

			/*debugger
			const newArray = event.previousContainer.data.filter(e => e.id !== event.item.data.id);
			event.previousContainer.data = [...newArray];
			event.container.data.push(event.item.data)*/
		}
	}

	getData() {
		this.api.get('talentos', 1).subscribe(
			(data) => {
				this.images = data;
			}
		);
	}

	continuar() {
		if (this.list2.length < 12){
			Swal.fire({
				title: 'El buzón Talentos más desarrollados debe contener un mínimo de 12 talentos',
				icon: 'warning',
				timer: 2000
			});
			return false;
		}else if (this.list4.length < 6){
			Swal.fire({
				title: 'El buzón Talentos menos desarrollados debe contener un mínimo de 6 talentos',
				icon: 'warning',
				timer: 2000
			});
			return false;
		}

		const masDes = this.modifyArray(this.list2, 2);
		const inter = this.modifyArray(this.list3, 1);
		const menDes = this.modifyArray(this.list4, 0);
		const data = [...masDes, ...inter, ...menDes];

		this.api.post('encuesta_puntaje', [data, 1]).subscribe(
			(data) => {
				console.log('data', data);
				this.router.navigate(['./mas-desarrollados']);
			},
			(error) => {
				console.log('error', error);
			}
		);
	}

	modifyArray(arr, tipo) {
		let array = [];
		arr.forEach( a => {
			let obj = {
				encuesta_id: this.encuesta.encuesta_id,
				persona_id: this.encuesta.persona_id,
				talento_id: a.id,
				tipo: tipo
			}
			array.push(obj);
		});
		return array;
	}

	localStore(encuesta_id, persona_id){
		localStorage.setItem('encuesta_id', encuesta_id);
		localStorage.setItem('persona_id', persona_id);
	}

}

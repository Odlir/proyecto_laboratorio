import {Component, OnInit, Renderer2} from '@angular/core';
import {SharedVarService} from '../../../Services/shared/shared-var.service';
import {ApiBackRequestService} from '../../../Services/api-back-request.service';
import {Router} from '@angular/router';
import Swal from "sweetalert2";

@Component({
  selector: 'app-especificos-menos',
  templateUrl: './especificos-menos.component.html',
  styleUrls: ['./especificos-menos.component.css']
})
export class EspecificosMenosComponent implements OnInit {

	public sucursal: string = '';
	public alumno: string = '';
	public images = [];
	public total: number;
	public seleccionados: number = 0;
	selectedIndex = -1;
	public continue: boolean= false;
	public store = [];
	public toggle: boolean = false;
	public finalizado: boolean = true;

	constructor(private sharedService: SharedVarService,
				private api: ApiBackRequestService,
				private router: Router,
				private renderer: Renderer2) {}

	ngOnInit(): void {
		this.getData();
	}

	continuar() {
		const data = this.modifyArray(this.store);
		this.api.post('encuesta_puntaje', [data, 5]).subscribe(
			(data) => {
				this.terminarEncuesta();
			},
			(error) => {
				console.log('error', error);
			}
		);
	}

	terminarEncuesta() {
		const encuesta = {
			encuesta_id: localStorage.getItem('encuesta_id'),
			persona_id: localStorage.getItem('persona_id')
		}
		this.api.post('encuesta_persona', [encuesta, 2]).subscribe(
			(data) => {
				Swal.fire({
					title: 'Test Enviado Correctamente.',
					icon: 'success'
				});
				this.finalizado = false;
			},
			(error) => {
				console.log('error', error);
			}
		);
	}

	modifyArray(arr) {
		let array = [];
		arr.forEach( a => {
			let obj = {
				encuesta_id: localStorage.getItem('encuesta_id'),
				persona_id: localStorage.getItem('persona_id'),
				talento_id: a.id
			}
			array.push(obj);
		});
		return array;
	}

	showBack() {
		this.toggle = !this.toggle;
	}

	getSelected(e, obj) {
		const hasClass = e.target.classList.contains('selected');

		if(hasClass) {
			this.renderer.removeClass(e.target, 'selected');
			this.seleccionados--;
			this.store = this.store.filter(i => i.id !==obj.id);
		} else {
			if (this.seleccionados < 3){
				this.renderer.addClass(e.target, 'selected');
				this.seleccionados++;
				this.store.push(obj);
				this.counter(this.seleccionados);
			}
		}

	}

	getData() {
		this.alumno = localStorage.getItem('alumno');
		this.sucursal = localStorage.getItem('sucursal');
		const encuesta_id = localStorage.getItem('encuesta_id');
		const persona_id = localStorage.getItem('persona_id');
		this.api.get('talentos?encuesta_id=' + encuesta_id + '&persona_id=' + persona_id +'&tipo='+4).subscribe(
			(data) => {
				this.images = Object.values(data);
				this.total = Object.values(data).length;
			}
		);
	}

	counter(selected) {
		if (selected === 3){
			console.log('ele', this.store);
			this.continue = true;
			Swal.fire({
				text: 'Has terminado de elegir tus 3 talentos especificos. Si estás seguro de tus respuestas, haz click en Finalizar.',
				icon: 'success'
			});
		}
	}

}

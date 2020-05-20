import {Component, OnInit, Renderer2} from '@angular/core';
import {SharedVarService} from '../../../Services/shared/shared-var.service';
import {ApiBackRequestService} from '../../../Services/api-back-request.service';
import {Router} from '@angular/router';
import Swal from "sweetalert2";

@Component({
  selector: 'app-menos-desarrollados',
  templateUrl: './menos-desarrollados.component.html',
  styleUrls: ['./menos-desarrollados.component.css']
})
export class MenosDesarrolladosComponent implements OnInit {

	public sucursal: string = '';
	public alumno: string = '';
	public images = [];
	public total: number;
	public seleccionados: number = 0;
	selectedIndex = -1;
	public continue: boolean= false;
	public store = [];
	public toggle: boolean = false;

	constructor(private sharedService: SharedVarService,
				private api: ApiBackRequestService,
				private router: Router,
				private renderer: Renderer2) {}

	ngOnInit(): void {
		this.getData();
	}

	continuar() {
		const data = this.modifyArray(this.store);
		this.api.post('encuesta_puntaje', [data, 3]).subscribe(
			(data) => {
				this.router.navigate(['./especificos']);
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
				talento_id: a.talento_id
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
			if (this.seleccionados < 6){
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
		this.api.get('talentos?encuesta_id=' + encuesta_id + '&persona_id=' + persona_id +'&tipo='+0).subscribe(
			(data) => {
				this.images = data;
				this.total = data.length;
			}
		);
	}

	counter(selected) {
		if (selected === 6){
			this.continue = true;
			Swal.fire({
				title: 'Test de Talentos.',
				text: 'Has terminado de elegir tus 6 talentos menos desarrollados. Si estás seguro de tus respuestas, haz click en CONTINUAR.',
				icon: 'success'
			});
		}
	}

}

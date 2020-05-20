import {Component, OnInit, Renderer2} from '@angular/core';
import {SharedVarService} from '../../../Services/shared/shared-var.service';
import {ApiBackRequestService} from '../../../Services/api-back-request.service';
import {Router} from '@angular/router';
import Swal from "sweetalert2";

@Component({
  selector: 'app-especificos',
  templateUrl: './especificos.component.html',
  styleUrls: ['./especificos.component.css']
})
export class EspecificosComponent implements OnInit {

	public sucursal = 'Colegio UPC';
	public alumno = 'Humberto Gutierrez';
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
		this.api.post('encuesta_puntaje', [data, 4]).subscribe(
			(data) => {
				this.router.navigate(['./especificos-menos']);
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
		this.api.get('talentos', 2).subscribe(
			(data) => {
				this.images = data;
				this.total = data.length;
			}
		);
	}

	counter(selected) {
		if (selected === 3){
			console.log('ele', this.store);
			this.continue = true;
			Swal.fire({
				title: 'Test de Talentos.',
				text: 'Has terminado de elegir tus 3 talentos especificos. Si estás seguro de tus respuestas, haz click en CONTINUAR.',
				icon: 'success'
			});
		}
	}

}

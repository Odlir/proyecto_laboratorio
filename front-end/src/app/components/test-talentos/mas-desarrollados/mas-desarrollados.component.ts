import {ChangeDetectorRef, Component, NgZone, OnInit, Renderer2} from '@angular/core';
import {SharedVarService} from '../../../Services/shared/shared-var.service';
import {ApiBackRequestService} from '../../../Services/api-back-request.service';
import Swal from "sweetalert2";
import {Router} from '@angular/router';

@Component({
	selector: 'app-mas-desarrollados',
	templateUrl: './mas-desarrollados.component.html',
	styleUrls: ['./mas-desarrollados.component.css']
})
export class MasDesarrolladosComponent implements OnInit {

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

		/*let obj = {
			encuesta_id: null,
			persona_id: null,
			talento_id: null
		};

		let data = [];

		this.api.post('encuesta_puntaje', [data, 2]).subscribe(
			(data) => {

			},
			(error) => {

			}
		);
*/
		this.router.navigate(['./menos-desarrollados']);
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
			if (this.seleccionados < 12){
				this.renderer.addClass(e.target, 'selected');
				this.seleccionados++;
				this.store.push(obj);
				this.counter(this.seleccionados);
			}
		}

	}

	getData() {
		this.api.get('talentos?encuesta_id=' + 3 + '&persona_id=' + 1 +'&tipo='+2).subscribe(
			(data) => {
				this.images = data;
				this.total = data.length;
			}
		);
	}

	counter(selected) {
		if (selected === 12){
			console.log('ele', this.store);
			this.continue = true;
			Swal.fire({
				title: 'Test de Talentos.',
				text: 'Has terminado de elegir tus 12 talentos más desarrollados. Si estás seguro de tus respuestas, haz click en CONTINUAR.',
				icon: 'success'
			});
		}
	}

}

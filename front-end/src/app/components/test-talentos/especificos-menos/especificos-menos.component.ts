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

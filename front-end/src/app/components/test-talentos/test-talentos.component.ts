import {Component, OnInit} from '@angular/core';
import {CdkDragDrop, moveItemInArray, transferArrayItem} from '@angular/cdk/drag-drop';
import {NgbCarouselConfig} from '@ng-bootstrap/ng-bootstrap';
import {ApiBackRequestService} from '../../Services/api-back-request.service';
import {ActivatedRoute, Router} from '@angular/router';
import {SharedVarService} from '../../Services/shared/shared-var.service';

@Component({
	selector: 'app-test-talentos',
	templateUrl: './test-talentos.component.html',
	styleUrls: ['./test-talentos.component.css']
})
export class TestTalentosComponent implements OnInit {

	public sucursal = null;
	public alumno = 'Humberto Gutierrez';
	form = {
		pregunta_id: null,
		respuesta_id: null,
		encuesta_id: null,
		persona_id: null
	};
	images = [];//[944, 1011, 984].map((n) => `https://picsum.photos/id/${n}/900/500`);
	list2 = [];
	list3 = [];
	list4 = [];
	con: any;
	path:string = '../../../assets/talentos/front/';
	encuesta = {
		encuesta_id: null,
		persona_id: null,
	}

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
		this.obtenerDatos();
	}

	obtenerDatos() {
		console.log('odlir', this.encuesta);
		/*this.api.get('encuesta_puntaje?encuesta_id=' + this.encuesta.encuesta_id + '&persona_id=' + this.encuesta.persona_id).subscribe(
			(data) => {
				console.log('odlir', data);
			}
		);*/
	}

	drop(event: CdkDragDrop<any>) {
		if (event.previousContainer === event.container) {
			moveItemInArray(event.container.data, event.previousIndex, event.currentIndex);
		} else {
			/*transferArrayItem(event.previousContainer.data,
				event.container.data,
				event.previousIndex,
				event.currentIndex);*/
			debugger
			const newArray = event.previousContainer.data.filter(e => e.id !== event.item.data.id);
			event.previousContainer.data = [...newArray];
			event.container.data.push(event.item.data)
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
		//console.log('odlir', this.images, this.list2, this.list3, this.list4);
		this.router.navigate(['./mas-desarrollados']);
	}

}

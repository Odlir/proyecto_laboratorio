import {Component, OnInit} from '@angular/core';
import {CdkDragDrop, moveItemInArray, transferArrayItem} from '@angular/cdk/drag-drop';
import {NgbCarouselConfig} from '@ng-bootstrap/ng-bootstrap';
import {ApiBackRequestService} from '../../Services/api-back-request.service';

@Component({
	selector: 'app-test-talentos',
	templateUrl: './test-talentos.component.html',
	styleUrls: ['./test-talentos.component.css']
})
export class TestTalentosComponent implements OnInit {

	public sucursal = null;
	public alumno = null;
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

	constructor(config: NgbCarouselConfig, private api: ApiBackRequestService) {
		config.showNavigationIndicators = false;
		config.interval = 0;
	}

	ngOnInit(): void {
		this.getData();
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
		this.api.get('talentos').subscribe(
			(data) => {
				this.images = data;
				console.log('data', this.images);
			}
		);
	}

	continuar() {
		console.log('odlir', this.images, this.list2, this.list3, this.list4);
	}

}

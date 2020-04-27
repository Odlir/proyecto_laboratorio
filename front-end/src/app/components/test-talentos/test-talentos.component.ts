import {Component, OnInit} from '@angular/core';
import {CdkDragDrop, moveItemInArray, transferArrayItem} from '@angular/cdk/drag-drop';
import {NgbCarouselConfig} from '@ng-bootstrap/ng-bootstrap';

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
	images = [944, 1011, 984].map((n) => `https://picsum.photos/id/${n}/900/500`);
	list2 = [];
	con: any;

	constructor(config: NgbCarouselConfig) {
		this.con = config;
		config.showNavigationIndicators = true;
		config.interval = 10000;
	}

	ngOnInit(): void {

	}

	drop(event: CdkDragDrop<string[]>) {
		if (event.previousContainer === event.container) {
			moveItemInArray(event.container.data, event.previousIndex, event.currentIndex);
		} else {
			transferArrayItem(event.previousContainer.data,
				event.container.data,
				event.previousIndex,
				event.currentIndex);
		}
	}

	show() {
		this.con.showNavigationArrows = true;
		this.con.showNavigationIndicators = true;
	}

}

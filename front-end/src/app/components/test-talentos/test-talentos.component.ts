import {Component, OnInit} from '@angular/core';

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

	constructor() {
	}

	ngOnInit(): void {
	}

}

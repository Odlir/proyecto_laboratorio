import {ChangeDetectorRef, Component, NgZone, OnInit} from '@angular/core';
import {SharedVarService} from '../../../Services/shared/shared-var.service';

@Component({
	selector: 'app-mas-desarrollados',
	templateUrl: './mas-desarrollados.component.html',
	styleUrls: ['./mas-desarrollados.component.css']
})
export class MasDesarrolladosComponent implements OnInit {

	public sucursal = null;
	public alumno = 'Humberto Gutierrez';
	public images = [];

	constructor(private sharedService: SharedVarService) {

	}

	ngOnInit(): void {
		console.log('odlir');
		this.sharedService.getValue().subscribe(value => {
			console.log('subs');
			//this.images = value;
			console.log('images', this.images);
		});
	}

}

import {Component, OnInit} from '@angular/core';
import {SharedVarService} from './Services/shared/shared-var.service';

@Component({
	selector: 'app-root',
	templateUrl: './app.component.html',
	styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
	title = 'front-end';
	public isExpanded: boolean;
	public isShowing:boolean = false;

	constructor(private sharedService: SharedVarService) {
	}

	ngOnInit(): void {
		this.sharedService.getValue().subscribe( value => {
			this.isExpanded = value;
		});
	}

}

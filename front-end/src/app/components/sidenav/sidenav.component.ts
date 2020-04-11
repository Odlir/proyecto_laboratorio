import {Component, OnInit} from '@angular/core';
import {SharedVarService} from '../../Services/shared/shared-var.service';

@Component({
	selector: 'app-sidenav',
	templateUrl: './sidenav.component.html',
	styleUrls: ['./sidenav.component.css']
})
export class SidenavComponent implements OnInit {

	public isExpanded: boolean;

	constructor(private sharedService: SharedVarService) {
	}

	ngOnInit(): void {
		this.sharedService.getValue().subscribe( value => {
			this.isExpanded = value;
		});
	}

	public onOpen() {
		console.log('open');
	}

	public onClose() {
		console.log('close');
	}

	public onChangeVisibility(event) {
		console.log('change visibility', event);
	}

}

import { RoutingStateService } from './Services/routing/routing-state.service';
import {Component, OnInit} from '@angular/core';
import { Router } from '@angular/router';
import {SharedVarService} from './Services/shared/shared-var.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
	title = 'Sistema de Encuestas';
	public isExpanded: boolean;
	public isShowing:boolean = false;

	constructor(private router: Router, private sharedService: SharedVarService,routingState: RoutingStateService) {
		routingState.loadRouting();
	}

	ngOnInit(): void {
		this.sharedService.getValue().subscribe( value => {
			this.isExpanded = value;
		});
		this.router.navigateByUrl('/dashboard');
	}

}

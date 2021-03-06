import { TokenService } from './../../Services/token/token.service';
import { Component, OnInit } from '@angular/core';
import { SharedVarService } from '../../Services/shared/shared-var.service';
import { Subscription } from 'rxjs';
import { Router } from '@angular/router';

@Component({
	selector: 'app-sidenav',
	templateUrl: './sidenav.component.html',
	styleUrls: ['./sidenav.component.css']
})
export class SidenavComponent implements OnInit {

	public login: Subscription;

	public isExpanded: boolean;
	public showMenu: boolean;

	constructor(private sharedService: SharedVarService,
		private token: TokenService,
		private router: Router) {
		this.login = this.sharedService.getShowMenu().subscribe(() => {
			this.showMenu = this.show();
		})
	}

	ngOnInit(): void {
		this.sharedService.getValue().subscribe(value => {
			this.isExpanded = value;
		});

		this.showMenu = this.show();
	}

	navigate(route) {
		this.router.navigateByUrl(route);
	}

	show() {
		if (this.token.loggedIn()) {
			return true;
		}
		else {
			return false;
		}
	}

}

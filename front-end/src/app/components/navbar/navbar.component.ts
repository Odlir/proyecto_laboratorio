import { TokenService } from '../../Services/token/token.service';
import { Router } from '@angular/router';
import { AuthService } from '../../Services/token/auth.service';
import { Component, OnInit } from '@angular/core';
import { SharedVarService } from '../../Services/shared/shared-var.service';
import { Subscription } from 'rxjs';

@Component({
	selector: 'app-navbar',
	templateUrl: './navbar.component.html',
	styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
	public loggedIn: boolean;
	public isExpanded: boolean;
	public showButton: boolean;
	public login: Subscription;

	constructor(
		private Auth: AuthService,
		private router: Router,
		private Token: TokenService,
		private sharedService: SharedVarService) {

		this.login = this.sharedService.getShowButtonMenu().subscribe(() => {
			this.show();
		})
	}

	ngOnInit(): void {
		this.Auth.authStatus.subscribe(value => this.loggedIn = value);
		this.sharedService.getValue().subscribe(value => {
			this.isExpanded = value;
		});
		this.show();
	}

	expanded(isExpanded): void {
		this.sharedService.setValue(!isExpanded);
	}

	show() {
		if (this.Token.loggedIn()) {
			this.showButton = true;
		}
		else {
			this.showButton = false;
		}
	}

	logout(event: MouseEvent) {
		event.preventDefault();
		this.Token.remove();
		this.Auth.changeAuthStatus(false);
		this.sharedService.sendShowMenu();
		this.show();
		this.router.navigateByUrl('/login');
	}

}

import {TokenService} from '../../Services/token/token.service';
import {Router} from '@angular/router';
import {AuthService} from '../../Services/token/auth.service';
import {Component, OnInit} from '@angular/core';
import {SharedVarService} from '../../Services/shared/shared-var.service';

@Component({
	selector: 'app-navbar',
	templateUrl: './navbar.component.html',
	styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
	public loggedIn: boolean;
	public isExpanded: boolean;

	constructor(
		private Auth: AuthService,
		private router: Router,
		private Token: TokenService,
		private sharedService: SharedVarService) {
	}

	ngOnInit(): void {
		this.Auth.authStatus.subscribe(value => this.loggedIn = value);
		this.sharedService.getValue().subscribe( value => {
			this.isExpanded = value;
		});
	}

	expanded(isExpanded): void {
		this.sharedService.setValue(!isExpanded);
	}

	logout(event: MouseEvent) {
		event.preventDefault();
		this.Token.remove();
		this.Auth.changeAuthStatus(false);
		this.router.navigateByUrl('/login');
	}

}

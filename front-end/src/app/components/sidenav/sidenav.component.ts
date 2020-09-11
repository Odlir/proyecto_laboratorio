import { TokenService } from './../../Services/token/token.service';
import { Component, OnInit } from '@angular/core';
import { SharedVarService } from '../../Services/shared/shared-var.service';
import { Subscription } from 'rxjs';
import { Router } from '@angular/router';
import { MediaObserver, MediaChange } from '@angular/flex-layout';

@Component({
	selector: 'app-sidenav',
	templateUrl: './sidenav.component.html',
	styleUrls: ['./sidenav.component.css']
})
export class SidenavComponent implements OnInit {

	public login: Subscription;

	public isExpanded: boolean;
	public showMenu: boolean;

	opened = true;
	over = 'side';
	expandHeight = '42px';
	collapseHeight = '42px';
	displayMode = 'flat';
	// overlap = false;
  
	watcher: Subscription;

	constructor(private sharedService: SharedVarService,media: MediaObserver,
		private token: TokenService,
		private router: Router) {
		this.login = this.sharedService.getShowMenu().subscribe(() => {
			this.showMenu = this.show();
		})

		this.watcher = media.media$.subscribe((change: MediaChange) => {
			if (change.mqAlias === 'sm' || change.mqAlias === 'xs') {
			  this.opened = false;
			  this.over = 'over';
			} else {
			  this.opened = true;
			  this.over = 'side';
			}
		  });
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

import { TokenService } from './token.service';
import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})

export class AfterLoginService implements CanActivate {

  constructor(private Token: TokenService, private router: Router) { }
  canActivate(route: import("@angular/router").ActivatedRouteSnapshot, state: import("@angular/router").RouterStateSnapshot): boolean | import("@angular/router").UrlTree | import("rxjs").Observable<boolean | import("@angular/router").UrlTree> | Promise<boolean | import("@angular/router").UrlTree> {
    if (this.Token.loggedIn()) {
      return true;
    }
    else {
      this.router.navigateByUrl('/');
    }
  }
}

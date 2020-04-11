import { AuthService } from '../../Services/token/auth.service';
import { Router } from '@angular/router';
import { TokenService } from '../../Services/token/token.service';
import { JarwisService } from '../../Services/token/jarwis.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  public form = {
    email: null,
    password: null
  };

  public error = null;

  constructor(
    private Jarwis: JarwisService,
    private Token: TokenService,
    private router: Router,
    private Auth: AuthService
    ) { }

  onSubmit()
  {
    this.Jarwis.login(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)
    );
  }

  handleResponse(data)
  {
    this.Token.handle(data.access_token, data.user);
    this.Auth.changeAuthStatus(true);
    this.router.navigateByUrl('/dashboard');
  }

  handleError(error)
  {
    this.error = error.error.error;
  }

  ngOnInit(): void {
  }

}

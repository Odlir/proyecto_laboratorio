import { HttpClient } from '@angular/common/http';
import { ConstantsService } from '../../common/constants.service';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class TokenService {
  private constants = new ConstantsService();
  public apiUrl = this.constants.apiUrl;

  private iss = {
    login: this.apiUrl + 'login',
    signup: this.apiUrl + 'signup'
  };

  constructor(private http: HttpClient) {};

  handle(token, id)
  {
    this.set(token, id);
  }

  set(token, id)
  {
    localStorage.setItem('token', token);
    localStorage.setItem('id', id);
  }

  get()
  {
    return localStorage.getItem('token');
  }

  me()
  {
    return localStorage.getItem('id');
  }

  remove()
  {
    localStorage.removeItem('token');
    localStorage.removeItem('id');
  }

  isValid()
  { const token = this.get();
    if (token)
    {
      const payload = this.payload(token);

      if (payload)
      {
        return Object.values(this.iss).indexOf(payload.iss) > -1 ? true : false;
      }
    }
  }

  payload(token)
  {
    const payload = token.split('.')[1];

    return this.decode(payload);
  }

  decode(payload)
  {
    return JSON.parse(atob(payload));
  }

  loggedIn()
  {
    return this.isValid();
  }

}

import { ConstantsService } from '../../common/constants.service';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class JarwisService {
  private constants = new ConstantsService();
  public apiUrl = this.constants.apiUrl;

  constructor(private http: HttpClient) { }

  signup(data) {
    return this.http.post(this.apiUrl + 'signup', data);
  }

  login(data) {
    return this.http.post(this.apiUrl + 'login', data);
  }
}

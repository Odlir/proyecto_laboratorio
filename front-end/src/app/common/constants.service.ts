import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ConstantsService {
  // readonly apiUrl: string = 'http://127.0.0.1:8000/api/';
  readonly apiUrl: string = 'https://www.gaf.com.pe/back-encuesta/api/';
  constructor() { }
}

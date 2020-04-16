import { ConstantsService } from './../common/constants.service';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { TokenService } from './token/token.service';
import { Observable, throwError} from 'rxjs';
import { catchError } from 'rxjs/operators';
import { map } from 'rxjs/operators';
import * as fileSaver from 'file-saver';

@Injectable({
  providedIn: 'root'
})
export class ApiBackRequestService {

  constructor(
    private http: HttpClient,
    private constants: ConstantsService,
    private Token: TokenService) {}

  getHeaders(): HttpHeaders {
    let headers = new HttpHeaders();
    const token = this.Token.get();
    headers = headers.append('Content-Type', 'application/json');
    if (token !== null) {
        headers = headers.append('Authorization', token);
    }
    return headers;
	}

	getHeadersMultipart():HttpHeaders {
		let headers = new HttpHeaders();
		let token = this.Token.get();
		if (token !== null) {
				headers = headers.append('Authorization', token);
		}
		return headers;
	}

  get(url: string): Observable<any> {
    // const me = this;
    return this.http.get(this.constants.apiUrl + url, {headers: this.getHeaders()} )
    .pipe(catchError(function(error: any) {
        console.log('Some error in catch');
        // if (error.status === 500 /*|| error.status === 403*/) {
        //     me.router.navigate(['/logout']);
        // }
        return throwError(error || 'Server error');
      }));
  }

  show(url: string, urlParams: any): Observable<any> {
    // const me = this;
    return this.http.get(this.constants.apiUrl + url + '/' + urlParams, {headers: this.getHeaders()} )
    .pipe(catchError(function(error: any) {
        console.log('Some error in catch');
        // if (error.status === 500 /*|| error.status === 403*/) {
        //     me.router.navigate(['/logout']);
        // }
        return throwError(error || 'Server error');
      }));
  }


  post(url: string, body: Object): Observable<any> {
    // const me = this;
    return this.http.post(this.constants.apiUrl + url, JSON.stringify(body), { headers: this.getHeaders()})
    .pipe(catchError(function(error: any) {
          console.log('Some error in catch');
          // if (error.status === 500) {
          //     me.router.navigate(['/logout']);
          // }
          return throwError(error || 'Server error');
      }));
  }

  put(url: string, urlParams: HttpParams, body: Object): Observable<any> {
      // const me = this;
      return this.http.put(this.constants.apiUrl + url + '/' + urlParams, JSON.stringify(body), { headers: this.getHeaders()})
      .pipe(catchError(function(error: any) {
              // if (error.status === 401) {
              //     me.router.navigate(['/logout']);
              // }
            return throwError(error || 'Server error')
        }));
  }

  delete(url: string, urlParams: HttpParams): Observable<any> {
      // const me = this;
      return this.http.delete(this.constants.apiUrl + url + '/' + urlParams, { headers: this.getHeaders()})
      .pipe(catchError(function(error: any) {
              // if (error.status === 401) {
              //     me.router.navigate(['/logout']);
              // }
            return throwError(error || 'Server error')
        }));
	}

	uploadFiles(url: string, formData: FormData): Observable<any> {

		return this.http.post(this.constants.apiUrl + url, formData, { headers: this.getHeadersMultipart() })
				.pipe(catchError(function (error: any) {
						console.log('some error uploading');
						return throwError(error || 'Server error')
				}));
	}

	downloadExcelFile(path: string): Observable<any>{
			return this.http.get(this.constants.apiUrl + path, { responseType: 'blob' })
			.pipe(map((response: any) =>
				fileSaver.saveAs(response, `importar-alumnos.xlsx`)
			),
			catchError(function (error: any) {
					console.log("Some error in catch");
					return throwError(error || 'Server error')
			}));
	}
}

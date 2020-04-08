import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Response, ResponseContentType, RequestOptions, Http } from '@angular/http';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/finally';
import { UserInfoService, LoginInfoInStorage } from '../user-info.service';
import { AppBackConfig } from '../../app-back-config';
declare var $: any;

@Injectable()
export class ApiBackRequestService {

    public pendingRequests = 0;
    public showLoading: boolean;
    constructor(
        private appConfig: AppBackConfig,
        private appConfig2: AppBackConfig2,
        private appConfig3: AppBackConfig3,
        private http: HttpClient,
        private router: Router,
        private userInfoService: UserInfoService
        , private http0: Http
    ) {}

    /**
     * This is a Global place to add all the request headers for every REST calls
     */
    getHeaders(): HttpHeaders {
        let headers = new HttpHeaders();
        const token = this.userInfoService.getStoredToken();
        headers = headers.append('Content-Type', 'application/json');
        if (token !== null) {
            headers = headers.append('Authorization', token);
        }
        return headers;
    }  

    get(url: string, urlParams?: HttpParams): Observable<any> {
        const me = this;
        return this.intercept(this.http.get(this.appConfig.baseApiPath + url, {headers: this.getHeaders(),  params: urlParams} )
            .catch(function(error: any) {
                console.log('Some error in catch');
                if (error.status === 500 /*|| error.status === 403*/) {
                    me.router.navigate(['/logout']);
                }
                return Observable.throw(error || 'Server error')
            }));
    }

	// Metodo creado para descargar archivos en formato blob
    getFile(url:string, urlParams?:HttpParams) {
        let me = this;
        return this.intercept(this.http.get(this.appConfig.baseApiPath + url, {headers:this.getHeaders(), responseType: 'blob', params:urlParams} )
            .catch(function(error:any){
                console.log("Some error in catch");
                if (error.status === 500 /*|| error.status === 403*/){
                    me.router.navigate(['/logout']);
                }
                return Observable.throw(error || 'Server error')
            }));
    }

    post(url: string, body: Object): Observable<any> {
        const me = this;
        return this.http.post(this.appConfig.baseApiPath + url, JSON.stringify(body), { headers: this.getHeaders()})
            .catch(function(error: any) {
               console.log('Some error in catch');
                if (error.status === 500) {
                    me.router.navigate(['/logout']);
                }
                return Observable.throw(error || 'Server error')
            });
    }

    put(url: string, body: Object): Observable<any> {
        const me = this;
        return this.http.put(this.appConfig.baseApiPath + url, JSON.stringify(body), { headers: this.getHeaders()})
            .catch(function(error: any) {
                if (error.status === 401) {
                    me.router.navigate(['/logout']);
                }
                return Observable.throw(error || 'Server error')
            });
    }

    delete(url: string): Observable<any> {
        const me = this;
        return this.http.delete(this.appConfig.baseApiPath + url, { headers: this.getHeaders()})
            .catch(function(error: any) {
                if (error.status === 401) {
                    me.router.navigate(['/logout']);
                }
                return Observable.throw(error || 'Server error')
            });
    }

    intercept(observable: Observable<Response>): Observable<Response> {
        this.pendingRequests++;
        return observable
            .do((res: Response) => {
                this.turnOnModal();
            }, (err: any) => {
                this.turnOffModal();
            })
            .finally(() => {
                var timer = Observable.timer(500);
                timer.subscribe(t => {
                    this.turnOffModal();
                });
            });
    }

    uploadFiles(url: string, form: FormData): Observable<any> {
        return this.http.post(this.appConfig.baseApiPath + url, form, { headers: this.getHeadersMultipart() })
            .catch(function (error: any) {
                console.log('some error uploading');
                return Observable.throw(error || 'Server error')
            });
    }

    downloadExcelFile(): Observable<any> {
        const httpOptions = {
          headers: new HttpHeaders({ 'responseType':  'blob',
          'Content-Type':  'application/vnd.ms-excel'})};
        return this.http.get(this.appConfig2.baseApiPath + '/api/DownloadExcelFile', httpOptions);
      }

    getHeadersMultipart():HttpHeaders {
        let headers = new HttpHeaders();
        let token = this.userInfoService.getStoredToken();
        if (token !== null) {
            headers = headers.append('Authorization', token);
        }
        return headers;
    }

    downloadFile(path: string): Observable<Blob> {
        let me = this;
        let headerOptions = new RequestOptions({ responseType: ResponseContentType.Blob });

        return this.http0.get(this.appConfig.baseApiPath + path, headerOptions)
            .map((response: Response) => <Blob>response.blob())
            .catch(function (error: any) {
                console.log("Some error in catch");
                if (error.status === 500 /*|| error.status === 403*/) {
                    me.router.navigate(['/logout']);
                }
                return Observable.throw(error || 'Server error')
            });
    }

    private turnOnModal() {
        if (!this.showLoading) {
            this.showLoading = true;
            $('#loaderSpinner').show();
        }
        this.showLoading = true;
      }

      private turnOffModal() {
        this.pendingRequests--;
        if (this.pendingRequests <= 0) {
          if (this.showLoading) {
            $('#loaderSpinner').hide();
          }
          this.showLoading = false;
        }
    }
}

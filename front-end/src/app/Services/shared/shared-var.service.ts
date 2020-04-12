import { TokenService } from './../token/token.service';
import {Injectable} from '@angular/core';
import {BehaviorSubject, Observable, Subject} from 'rxjs';

@Injectable({
	providedIn: 'root'
})
export class SharedVarService {

	private isExpanded: BehaviorSubject<boolean>;
	private subject = new Subject<any>();

	constructor(private token: TokenService) {
		this.isExpanded = new BehaviorSubject<boolean>(true);
	}

	getValue(): Observable<boolean> {
		return this.isExpanded.asObservable();
	}
	setValue(newValue): void {
		this.isExpanded.next(newValue);
	}

	sendShowMenu()
	{
		this.subject.next();
	}

	getShowMenu(): Observable<any>{
		return this.subject.asObservable();
	}

	sendShowButtonMenu()
	{
		this.subject.next();
	}

	getShowButtonMenu(): Observable<any>{
		return this.subject.asObservable();
	}

	sendSucursal(sucursal)
	{
		this.subject.next(sucursal);
	}

	getSucursal(): Observable<any>{
		return this.subject.asObservable();
	}
}

import {Injectable} from '@angular/core';
import {BehaviorSubject, Observable} from 'rxjs';

@Injectable({
	providedIn: 'root'
})
export class SharedVarService {

	private isExpanded: BehaviorSubject<boolean>;

	constructor() {
		this.isExpanded = new BehaviorSubject<boolean>(true);
	}

	getValue(): Observable<boolean> {
		return this.isExpanded.asObservable();
	}
	setValue(newValue): void {
		this.isExpanded.next(newValue);
	}

}

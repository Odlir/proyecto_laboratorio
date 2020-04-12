import { SharedVarService } from './../../../Services/shared/shared-var.service';
import { TokenService } from './../../../Services/token/token.service';
import { Component, OnInit} from '@angular/core';
import { BsModalRef } from 'ngx-bootstrap/modal/';

@Component({
  selector: 'app-modal-sucursal',
  templateUrl: './modal-sucursal.component.html',
  styleUrls: ['./modal-sucursal.component.css']
})
export class ModalSucursalComponent implements OnInit {

	form = {
		nombre: null
	}

  constructor(public bsModalRef: BsModalRef,private sharedService: SharedVarService) { }

  	ngOnInit(): void {

	}

	anadir()
	{
		this.sharedService.sendSucursal(this.form);
		this.bsModalRef.hide()
		this.limpiar();
	}

	limpiar()
	{
		this.form= {
			nombre: null
		}
	}

	cancelar()
	{
		this.form = {
			nombre: null
		}
		this.bsModalRef.hide()
	}
}

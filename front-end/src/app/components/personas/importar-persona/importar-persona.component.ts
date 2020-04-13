import { Router } from '@angular/router';

import { TokenService } from './../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-importar-persona',
  templateUrl: './importar-persona.component.html',
  styleUrls: ['./importar-persona.component.css']
})
export class ImportarPersonaComponent implements OnInit {

fileToUpload: File = null;

  constructor(private api: ApiBackRequestService, private user: TokenService, private router: Router) { }

  ngOnInit(): void {
	}

	handleFileInput(files: FileList) {
    this.fileToUpload = files.item(0);
	}

	async guardar()
	{
		const formData: FormData = new FormData();
		formData.append('file', this.fileToUpload);
		formData.append('user_id', this.user.me());

		await this.api.uploadFiles('importar', formData).toPromise().then(
		(data) => {this.cerrar()}
		);
	}

	async descargarPlantilla()
	{
		await this.api.downloadExcelFile('importar').toPromise().then(
				(data) => {}
		);
	}

	cerrar()
	{
		Swal.fire({
			title: 'Importación Exitosa',
			icon: 'success',
			showClass: {
			  popup: 'animated fadeInDown faster'
			},
			hideClass: {
			  popup: 'animated fadeOutUp faster'
			}
		  });
		this.router.navigateByUrl('/personas');
	}

}

import { HttpParams } from '@angular/common/http';
import { TokenService } from './../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2';
import { Location } from '@angular/common';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-importar-persona',
  templateUrl: './importar-persona.component.html',
  styleUrls: ['./importar-persona.component.css']
})
export class ImportarPersonaComponent implements OnInit {

fileToUpload: File = null;
public encuesta_id;

  constructor(private api: ApiBackRequestService, private user: TokenService, private _location: Location,private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
	this.activatedRoute.queryParams.subscribe(async params => {
		this.encuesta_id = params.encuesta_id;
	});
	}

	handleFileInput(files: FileList) {
    this.fileToUpload = files.item(0);
	}

	async guardar()
	{
		const formData: FormData = new FormData();
		formData.append('file', this.fileToUpload);
		formData.append('user_id', this.user.me());
		formData.append('encuesta_id', this.encuesta_id);

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

		  this.return();
	}

	return()
	{
		this._location.back();
	}

}

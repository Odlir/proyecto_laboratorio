import { ColumnMode } from '@swimlane/ngx-datatable';
import { map, startWith } from 'rxjs/operators';
import { Component, OnInit, ViewChild } from '@angular/core';
import Swal from 'sweetalert2';
import { Router, ActivatedRoute } from '@angular/router';
import { TokenService } from '../../../Services/token/token.service';
import { ApiBackRequestService } from './../../../Services/api-back-request.service';
import { HttpParams } from '@angular/common/http';
import {FormControl} from '@angular/forms';
import * as moment from 'moment';
import {FormGroup} from '@angular/forms';
import { MatStepper } from '@angular/material/stepper';

export interface Empresa {
	nombre: string,
	id: number,
}

@Component({
  selector: 'app-crud-encuesta',
  templateUrl: './crud-encuesta.component.html',
  styleUrls: ['./crud-encuesta.component.css']
})

export class CrudEncuestaComponent implements OnInit {

	loadingIndicator = true;
	reorderable = true;

	ColumnMode = ColumnMode;

	myControl = new FormControl();

	firstFormGroup: FormGroup;
	secondFormGroup: FormGroup;

	@ViewChild('stepper') stepper: MatStepper;

	public form = {
    fecha_inicio: moment().format('YYYY-MM-DD'),
    fecha_fin: null,
    empresa_sucursal_id: null,
    tipo_encuesta_id: null,
    insert_user_id: this.user.me(),
    edit_user_id: null,
    insert: {name: null},
    edit: {name: ''},
    created_at: null,
	updated_at: null,
	personas: []
	};

	empresa = {id:null, nombre: null};

	public tipos: any[];

	public empresas: Empresa[]= [];
	filteredEmpresas: any;

	public id: HttpParams;

	public titulo = 'PROGRAMAR ENCUESTA';

  constructor(private api: ApiBackRequestService,
    private user: TokenService,
    private router: Router,
		private activatedRoute: ActivatedRoute) {

		}

  ngOnInit(): void {
		this.fetch();

		this.activatedRoute.queryParams.subscribe(async params => {
			this.id = params.id;
			if (this.id != null) {
				this.cargarEditar();
			}
			else
			{
				this.obtenerFechaFin();
			}
		});
	}

	async fetch()
	{
		await this.api.get('tipo_encuesta').toPromise().then(
			(data) => {this.tipos=data;}
		);

		await this.api.get('empresa_sucursal').toPromise().then(
      (data) => {this.empresas = data}
		);

		this.filteredEmpresas = this.myControl.valueChanges.pipe(
			startWith(null),
			map(empresa => empresa && typeof empresa === 'object' ? empresa.nombre : empresa),
			map(empresa => this.filterStates(empresa))
		);
	}

	filterStates(val) {
    return val ? this.empresas.filter(s => s.nombre.toLowerCase().indexOf(val.toLowerCase()) === 0)
               : this.empresas;
	}

	displayFn(empresa): string {
      return empresa ? empresa.nombre : empresa;
  	}

	async cargarEditar()
	{
		await this.api.show('encuestas', this.id).toPromise().then(
		(data) => {
			this.form = data;
			this.titulo = 'EDITAR ENCUESTA PROGRAMADA';
			}
		);

		await this.api.show('empresa_sucursal', this.form.empresa_sucursal_id).toPromise().then(
			(data) => {
				this.empresa = data;
			}
		);

		this.stepper.selected.completed = true;
	}

  guardar()
  {
    if(this.id)
    {
      this.editar();
    }
    else
    {
      this.registrar();
    }
  }

  async registrar()
  {
		this.form.empresa_sucursal_id= this.empresa.id;

		if(this.form.tipo_encuesta_id==0)
		{
			this.tipos.forEach(async element=>{
					this.form.tipo_encuesta_id= element.id;

					await this.api.post('encuestas', this.form).toPromise().then(
						(data) => {this.handleRegistrar(data)}
					);
			});
		}else
		{
			await this.api.post('encuestas', this.form).toPromise().then(
				(data) => {this.handleRegistrar(data)}
			);
		}
  }

  handleRegistrar(data)
  {
	this.id=data.id;
	this.cargarEditar();
	this.stepper.selected.completed = true;
    this.stepper.next();
	this.cerrar('Registro Exitoso')
  }

  handleEditar()
  {
	this.cargarEditar();
	this.cerrar('Datos Actualizados Correctamente')
  }

  async editar()
  { this.form.edit_user_id = this.user.me();
		this.form.empresa_sucursal_id= this.empresa.id;

    await this.api.put('encuestas', this.id , this.form).toPromise().then(
      (data) => {this.handleEditar()}
    );
  }

  cerrar(mensaje)
  {
    Swal.fire({
      title: mensaje,
      icon: 'success',
      showClass: {
        popup: 'animated fadeInDown faster'
      },
      hideClass: {
        popup: 'animated fadeOutUp faster'
      }
    });
	}

	obtenerFechaFin()
	{
		this.form.fecha_fin=null;

		var fin= moment(this.form.fecha_inicio).add(+3, 'M');

  		this.form.fecha_fin=moment(fin).format('YYYY-MM-DD')
	}

	eliminarPersona(id)
	{
		Swal.fire({
			title: 'Desea eliminar la persona?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirmar'
			}).then(async (result) => {
				if (result.value) {
					await this.api.delete('encuesta_persona', id).toPromise().then(
						(data) => {
							this.form.personas=data.personas;
							this.form.personas = [...this.form.personas]
						}
					);
				}
			})
	}

	async updateFilter(event) {
		const val = event.target.value;

		await this.api.get('encuesta_persona?search=' + val +'&id='+this.id).toPromise().then(
			(data) => {
				this.form.personas=data.personas;
				this.form.personas = [...this.form.personas]
			}
		);
	}

}

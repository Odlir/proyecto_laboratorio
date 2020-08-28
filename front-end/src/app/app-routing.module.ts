import {ReportesComponent} from './components/reportes/reportes.component';
import {TestInteresComponent} from './components/test-interes/test-interes.component';
import {DetalleEncuestaComponent} from './components/encuestas/detalle-encuesta/detalle-encuesta.component';
import {CrudEncuestaComponent} from './components/encuestas/crud-encuesta/crud-encuesta.component';
import {EncuestasComponent} from './components/encuestas/encuestas.component';
import {ImportarPacienteComponent} from './components/pacientes/importar-paciente/importar-paciente.component';
import {DetalleSucursalComponent} from './components/empresas/detalle-sucursal/detalle-sucursal.component';
import {CrudSucursalComponent} from './components/empresas/crud-sucursal/crud-sucursal.component';
import {DetallePacienteComponent} from './components/pacientes/detalle-paciente/detalle-paciente.component';
import {CrudPacienteComponent} from './components/pacientes/crud-paciente/crud-paciente.component';
import {DetalleEmpresaComponent} from './components/empresas/detalle-empresa/detalle-empresa.component';
import {CrudEmpresaComponent} from './components/empresas/crud-empresa/crud-empresa.component';
import {EmpresasComponent} from './components/empresas/empresas.component';
import {PacientesComponent} from './components/pacientes/pacientes.component';
import {DashboardComponent} from './components/dashboard/dashboard.component';
import {AfterLoginService} from './Services/token/after-login.service';
import {BeforeLoginService} from './Services/token/before-login.service';
import {SignupComponent} from './components/signup/signup.component';
import {LoginComponent} from './components/login/login.component';
import {NgModule, Component} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {TestTemperamentosComponent} from './components/test-temperamentos/test-temperamentos.component';
import { TestTalentosComponent } from './components/test-talentos/test-talentos.component';
import {MasDesarrolladosComponent} from './components/test-talentos/mas-desarrollados/mas-desarrollados.component';
import {MenosDesarrolladosComponent} from './components/test-talentos/menos-desarrollados/menos-desarrollados.component';
import {EspecificosComponent} from './components/test-talentos/especificos/especificos.component';
import {EspecificosMenosComponent} from './components/test-talentos/especificos-menos/especificos-menos.component';
import { CrudDoctorComponent } from './components/doctores/crud-doctor/crud-doctor/crud-doctor.component';
import { DetalleDoctorComponent } from './components/doctores/detalle-doctor/detalle-doctor/detalle-doctor.component';
import { DoctoresComponent } from './components/doctores/doctores.component';
import { MuestrasComponent } from './components/muestras/muestras.component';
import { CrudMuestrasComponent } from './components/muestras/crud-muestras/crud-muestras/crud-muestras.component';
import { DetalleMuestrasComponent } from './components/muestras/detalle-muestras/detalle-muestras/detalle-muestras.component';
import { AnalisisComponent } from './components/analisis/analisis.component';
import { CrudAnalisisComponent } from './components/analisis/crud-analisis/crud-analisis/crud-analisis.component';
import { DetalleAnalisisComponent } from './components/analisis/detalle-analisis/detalle-analisis/detalle-analisis.component';
import { OrdenAtencionComponent } from './components/orden-atencion/orden-atencion.component';
import { CrudOrdenAtencionComponent } from './components/orden-atencion/crud-orden-atencion/crud-orden-atencion/crud-orden-atencion.component';
import { DetalleOrdenAtencionComponent } from './components/orden-atencion/detalle-orden-atencion/detalle-orden-atencion/detalle-orden-atencion.component';
import { UbigeoComponent } from './components/ubigeo/ubigeo.component';
import { CrudUbigeoComponent } from './components/ubigeo/crud-ubigeo/crud-ubigeo/crud-ubigeo.component';
import { OrdenAtencionAnalisisComponent } from './components/orden-atencion/orden-atencion-analisis/orden-atencion-analisis.component';
import { CrudOrdenAtencionAnalisisComponent } from './components/orden-atencion/orden-atencion-analisis/crud-orden-atencion-analisis/crud-orden-atencion-analisis.component';
import { OrdenAtencionAnalisisTipoAnalisisComponent } from './components/orden-atencion/orden-atencion-analisis-tipo-analisis/orden-atencion-analisis-tipo-analisis.component';
import { CrudOrdenAtencionAnalisisTipoAnalisisComponent } from './components/orden-atencion/orden-atencion-analisis-tipo-analisis/crud-orden-atencion-analisis-tipo-analisis/crud-orden-atencion-analisis-tipo-analisis.component';
import { OrdenAtencionAnalisisTipoMuestrasComponent } from './components/orden-atencion/orden-atencion-analisis-tipo-muestras/orden-atencion-analisis-tipo-muestras.component';
import { CrudOrdenAtencionAnalisisTipoMuestrasComponent } from './components/orden-atencion/orden-atencion-analisis-tipo-muestras/crud-orden-atencion-analisis-tipo-muestras/crud-orden-atencion-analisis-tipo-muestras.component';
import { DetalleOrdenAtencionAnalisisComponent } from './components/orden-atencion/orden-atencion-analisis/detalle-orden-atencion-analisis/detalle-orden-atencion-analisis.component';
import { DetalleOrdenAtencionAnalisisTipoAnalisisComponent } from './components/orden-atencion/orden-atencion-analisis-tipo-analisis/detalle-orden-atencion-analisis-tipo-analisis/detalle-orden-atencion-analisis-tipo-analisis.component';
import { DetalleOrdenAtencionAnalisisTipoMuestrasComponent } from './components/orden-atencion/orden-atencion-analisis-tipo-muestras/detalle-orden-atencion-analisis-tipo-muestras/detalle-orden-atencion-analisis-tipo-muestras.component';

const routes: Routes = [
	{
		path: '',
		component: LoginComponent,
		canActivate: [BeforeLoginService]
	},
	{
	  path: 'signup',
	  component: SignupComponent,
	  canActivate: [AfterLoginService]
	},
	{
		path: 'dashboard',
		canActivate: [AfterLoginService],
		redirectTo: 'encuestas'
	},
	{
		path: 'pacientes',
		component: PacientesComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-paciente',
		component: CrudPacienteComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-paciente',
		component: DetallePacienteComponent,
		canActivate: [AfterLoginService]
	},

	{
		path: 'doctores',
		component: DoctoresComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-doctor',
		component: CrudDoctorComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-doctor',
		component: DetalleDoctorComponent,
		canActivate: [AfterLoginService]
	},


	{
		path: 'empresas',
		component: EmpresasComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-empresa',
		component: CrudEmpresaComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-empresa',
		component: DetalleEmpresaComponent,
		canActivate: [AfterLoginService]
	},

	{
		path: 'ubigeo',
		component: UbigeoComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-ubigeo',
		component: CrudUbigeoComponent,
		canActivate: [AfterLoginService]
	},

	{
		path: 'muestras',
		component: MuestrasComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-muestras',
		component: CrudMuestrasComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-muestras',
		component: DetalleMuestrasComponent,
		canActivate: [AfterLoginService]
	},

	{
		path: 'analisis',
		component: AnalisisComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-analisis',
		component: CrudAnalisisComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-analisis',
		component: DetalleAnalisisComponent,
		canActivate: [AfterLoginService]
	},

	{
		path: 'orden-atencion',
		component: OrdenAtencionComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-orden-atencion',
		component: CrudOrdenAtencionComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-orden-atencion',
		component: DetalleOrdenAtencionComponent,
		canActivate: [AfterLoginService]
	},

	{
		path: 'orden-atencion-analisis',
		component: OrdenAtencionAnalisisComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-orden-atencion-analisis',
		component: CrudOrdenAtencionAnalisisComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-orden-atencion-analisis',
		component: DetalleOrdenAtencionAnalisisComponent,
		canActivate: [AfterLoginService]
	},


	{
		path: 'orden-atencion-analisis-tipo-analisis',
		component: OrdenAtencionAnalisisTipoAnalisisComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-orden-atencion-analisis-tipo-analisis',
		component: CrudOrdenAtencionAnalisisTipoAnalisisComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-orden-atencion-analisis-tipo-analisis',
		component: DetalleOrdenAtencionAnalisisTipoAnalisisComponent,
		canActivate: [AfterLoginService]
	},


	{
		path: 'orden-atencion-analisis-tipo-muestras',
		component: OrdenAtencionAnalisisTipoMuestrasComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-orden-atencion-analisis-tipo-muestras',
		component: CrudOrdenAtencionAnalisisTipoMuestrasComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-orden-atencion-analisis-tipo-muestras',
		component: DetalleOrdenAtencionAnalisisTipoMuestrasComponent,
		canActivate: [AfterLoginService]
	},
	

	{
		path: 'crud-sucursal',
		component: CrudSucursalComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-sucursal',
		component: DetalleSucursalComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'importar-paciente',
		component: ImportarPacienteComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'encuestas',
		component: EncuestasComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'crud-encuesta',
		component: CrudEncuestaComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'detalle-encuesta',
		component: DetalleEncuestaComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'test-intereses/:encuesta_id/:persona_id',
		component: TestInteresComponent
	},
	{
		path: 'test-temperamentos/:encuesta_id/:persona_id',
		component: TestTemperamentosComponent
	},
	{
		path: 'reportes',
		component: ReportesComponent,
		canActivate: [AfterLoginService]
	},
	{
		path: 'test-talentos/:encuesta_id/:persona_id',
		component: TestTalentosComponent
	},
	{
		path: 'mas-desarrollados',
		component: MasDesarrolladosComponent
	},
	{
		path: 'menos-desarrollados',
		component: MenosDesarrolladosComponent
	},
	{
		path: 'especificos',
		component: EspecificosComponent
	},
	{
		path: 'especificos-menos',
		component: EspecificosMenosComponent
	}
];

@NgModule({
	imports: [RouterModule.forRoot(routes, {useHash: true})],
	exports: [RouterModule]
})
export class AppRoutingModule {
}

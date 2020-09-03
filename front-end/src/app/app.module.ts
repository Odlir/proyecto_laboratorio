import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { SidenavComponent } from './components/sidenav/sidenav.component';
import { CommonModule } from '@angular/common';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { BsModalService } from 'ngx-bootstrap/modal';
import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';

/*FONT-AWESOME*/
import { FontAwesomeModule, FaIconLibrary } from '@fortawesome/angular-fontawesome';
import { fas } from '@fortawesome/free-solid-svg-icons';

/* VARIABLE GLOBAL*/
import { ConstantsService } from './common/constants.service';

/* ANGULAR MATERIAL*/
import { AppMaterialModule } from './app-material/app-material.module';

/* LIBRERIAS */
import { AppLibreriasModule } from './app-librerias/app-librerias.module';

/* */

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { HttpClientModule } from '@angular/common/http';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { PacientesComponent } from './components/pacientes/pacientes.component';
import { EmpresasComponent } from './components/empresas/empresas.component';
import { CrudPacienteComponent } from './components/pacientes/crud-paciente/crud-paciente.component';
import { DetalleEmpresaComponent } from './components/empresas/detalle-empresa/detalle-empresa.component';
import { CrudEmpresaComponent } from './components/empresas/crud-empresa/crud-empresa.component';
import { DetallePacienteComponent } from './components/pacientes/detalle-paciente/detalle-paciente.component';
import { CrudSucursalComponent } from './components/empresas/crud-sucursal/crud-sucursal.component';
import { DetalleSucursalComponent } from './components/empresas/detalle-sucursal/detalle-sucursal.component';
import { ImportarPacienteComponent } from './components/pacientes/importar-paciente/importar-paciente.component';
import { EncuestasComponent } from './components/encuestas/encuestas.component';
import { CrudEncuestaComponent } from './components/encuestas/crud-encuesta/crud-encuesta.component';
import { DetalleEncuestaComponent } from './components/encuestas/detalle-encuesta/detalle-encuesta.component';
import { TestInteresComponent } from './components/test-interes/test-interes.component';
import { HeaderComponent } from './components/partials/header/header.component';
import { AuditoriaComponent } from './components/partials/auditoria/auditoria.component';
import { AlumnosComponent } from './components/encuestas/alumnos/alumnos.component';
import { SucursalComponent } from './components/empresas/sucursal/sucursal.component';
import { HeaderEncuestaComponent } from './components/partials/header-encuesta/header-encuesta.component';
import { ReportesComponent } from './components/reportes/reportes.component';
import { TestTemperamentosComponent } from './components/test-temperamentos/test-temperamentos.component';
import { TestTalentosComponent } from './components/test-talentos/test-talentos.component';
import { NgProgressModule } from 'ngx-progressbar';
import { NgProgressHttpModule } from 'ngx-progressbar/http';
import { NgProgressRouterModule } from 'ngx-progressbar/router';
import { MasDesarrolladosComponent } from './components/test-talentos/mas-desarrollados/mas-desarrollados.component';
import { MenosDesarrolladosComponent } from './components/test-talentos/menos-desarrollados/menos-desarrollados.component';
import { EspecificosComponent } from './components/test-talentos/especificos/especificos.component';
import { EspecificosMenosComponent } from './components/test-talentos/especificos-menos/especificos-menos.component';
import { CrudDoctorComponent } from './components/doctores/crud-doctor/crud-doctor/crud-doctor.component';
import { DetalleDoctorComponent } from './components/doctores/detalle-doctor/detalle-doctor/detalle-doctor.component';
import { DoctoresComponent } from './components/doctores/doctores.component';
import { CrudMuestrasComponent } from './components/muestras/crud-muestras/crud-muestras/crud-muestras.component';
import { DetalleMuestrasComponent } from './components/muestras/detalle-muestras/detalle-muestras/detalle-muestras.component';
import { MuestrasComponent } from './components/muestras/muestras.component';
import { CrudAnalisisComponent } from './components/analisis/crud-analisis/crud-analisis/crud-analisis.component';
import { DetalleAnalisisComponent } from './components/analisis/detalle-analisis/detalle-analisis/detalle-analisis.component';
import { AnalisisComponent } from './components/analisis/analisis.component';
import { OrdenAtencionComponent } from './components/orden-atencion/orden-atencion.component';
import { CrudOrdenAtencionComponent } from './components/orden-atencion/crud-orden-atencion/crud-orden-atencion/crud-orden-atencion.component';
import { DetalleOrdenAtencionComponent } from './components/orden-atencion/detalle-orden-atencion/detalle-orden-atencion/detalle-orden-atencion.component';

@NgModule({
	declarations: [
		AppComponent,
		NavbarComponent,
		LoginComponent,
		SignupComponent,
		DashboardComponent,
		PacientesComponent,
		SidenavComponent,
		EmpresasComponent,
		CrudPacienteComponent,
		DetalleEmpresaComponent,
		CrudEmpresaComponent,
		DetallePacienteComponent,
		CrudSucursalComponent,
		DetalleSucursalComponent,
		ImportarPacienteComponent,
		EncuestasComponent,
		CrudEncuestaComponent,
		DetalleEncuestaComponent,
		TestInteresComponent,
		HeaderComponent,
		AuditoriaComponent,
		AlumnosComponent,
		SucursalComponent,
		HeaderEncuestaComponent,
		ReportesComponent,
		TestTemperamentosComponent,
		TestTalentosComponent,
		MasDesarrolladosComponent,
		MenosDesarrolladosComponent,
		EspecificosComponent,
		EspecificosMenosComponent,
		CrudDoctorComponent,
		DetalleDoctorComponent,
		DoctoresComponent,
		CrudMuestrasComponent,
		DetalleMuestrasComponent,
		MuestrasComponent,
		CrudAnalisisComponent,
		DetalleAnalisisComponent,
		AnalisisComponent,
		OrdenAtencionComponent,
		DetalleOrdenAtencionComponent,
		CrudOrdenAtencionComponent
	],
	imports: [
		BrowserModule,
		AppRoutingModule,
		HttpClientModule,
		CommonModule,
		FontAwesomeModule,
		AppMaterialModule,
		AppLibreriasModule,
		NgbModule,
		BrowserAnimationsModule,
		FormsModule,
		ReactiveFormsModule,
		TooltipModule.forRoot(),
		NgProgressModule,
		NgProgressHttpModule,
		NgProgressRouterModule,
		BsDatepickerModule.forRoot(),
	],
	providers: [ConstantsService, BsModalService],
	bootstrap: [AppComponent]
})
export class AppModule {
	constructor(library: FaIconLibrary) {
		library.addIconPacks(fas);
	}
}

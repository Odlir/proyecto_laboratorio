import { ReportesComponent } from './components/reportes/reportes.component';
import { TestInteresComponent } from './components/test-interes/test-interes.component';
import { DetalleEncuestaComponent } from './components/encuestas/detalle-encuesta/detalle-encuesta.component';
import { CrudEncuestaComponent } from './components/encuestas/crud-encuesta/crud-encuesta.component';
import { EncuestasComponent } from './components/encuestas/encuestas.component';
import { ImportarPersonaComponent } from './components/personas/importar-persona/importar-persona.component';
import { DetalleSucursalComponent } from './components/empresas/detalle-sucursal/detalle-sucursal.component';
import { CrudSucursalComponent } from './components/empresas/crud-sucursal/crud-sucursal.component';
import { DetallePersonaComponent } from './components/personas/detalle-persona/detalle-persona.component';
import { CrudPersonaComponent } from './components/personas/crud-persona/crud-persona.component';
import { DetalleEmpresaComponent } from './components/empresas/detalle-empresa/detalle-empresa.component';
import { CrudEmpresaComponent } from './components/empresas/crud-empresa/crud-empresa.component';
import { EmpresasComponent } from './components/empresas/empresas.component';
import { PersonasComponent } from './components/personas/personas.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { AfterLoginService } from './Services/token/after-login.service';
import { BeforeLoginService } from './Services/token/before-login.service';
import { SignupComponent } from './components/signup/signup.component';
import { LoginComponent } from './components/login/login.component';
import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { TestTemperamentosComponent } from './components/test-temperamentos/test-temperamentos.component';

const routes: Routes = [
  {
    path: '',
    component: LoginComponent,
    canActivate: [BeforeLoginService]
  },
  // {
  //   path: 'signup',
  //   component: SignupComponent,
  //   canActivate: [BeforeLoginService]
  // },
  {
    path: 'dashboard',
    component: DashboardComponent,
    canActivate: [AfterLoginService]
  },
  {
    path: 'personas',
    component: PersonasComponent,
    canActivate: [AfterLoginService]
  },
  {
    path: 'crud-persona',
    component: CrudPersonaComponent,
    canActivate: [AfterLoginService]
  },
  {
    path: 'detalle-persona',
    component: DetallePersonaComponent,
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
    path: 'importar-persona',
    component: ImportarPersonaComponent,
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
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes, { useHash: true })],
  exports: [RouterModule]
})
export class AppRoutingModule { }

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

const routes: Routes = [
  {
    path: 'login',
    component: LoginComponent,
    canActivate: [BeforeLoginService]
  },
  {
    path: 'signup',
    component: SignupComponent,
    canActivate: [BeforeLoginService]
  },
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
	}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

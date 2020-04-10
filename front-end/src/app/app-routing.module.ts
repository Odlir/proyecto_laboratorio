import { PersonasComponent } from './components/personas/personas.component';
import { DetalleComponent } from './components/personas/detalle/detalle.component';
import { CrudComponent } from './components/personas/crud/crud.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { AfterLoginService } from './Services/after-login.service';
import { BeforeLoginService } from './Services/before-login.service';
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
    component: CrudComponent,
    canActivate: [AfterLoginService]
  },
  {
    path: 'detalle-persona',
    component: DetalleComponent,
    canActivate: [AfterLoginService]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

import { SidenavComponent } from './components/sidenav/sidenav.component';

/*FONT-AWESOME*/
import { FontAwesomeModule, FaIconLibrary } from '@fortawesome/angular-fontawesome';
import { fas } from '@fortawesome/free-solid-svg-icons';


/* VARIABLE GLOBAL*/
import { ConstantsService } from './common/constants.service';


/* ANGULAR MATERIAL*/
import { AppMaterialModule } from './app-material/app-material.module';

/* LIBRERIAS */
import { AppLibreriasModule } from './app-librerias/app-librerias.module';

/* SIDEBAR */
import { SidebarjsModule } from 'ng-sidebarjs';


/* */
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { LoginComponent } from './components/login/login.component';
import { SignupComponent } from './components/signup/signup.component';
import { HttpClientModule } from '@angular/common/http';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { PersonasComponent } from './components/personas/personas.component';
import { EmpresasComponent } from './components/empresas/empresas.component';
import { CrudPersonaComponent } from './components/personas/crud-persona/crud-persona.component';
import { DetalleEmpresaComponent } from './components/empresas/detalle-empresa/detalle-empresa.component';
import { CrudEmpresaComponent } from './components/empresas/crud-empresa/crud-empresa.component';
import { DetallePersonaComponent } from './components/personas/detalle-persona/detalle-persona.component';


@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    LoginComponent,
    SignupComponent,
    DashboardComponent,
    PersonasComponent,
		SidenavComponent,
		EmpresasComponent,
		CrudPersonaComponent,
		DetalleEmpresaComponent,
		CrudEmpresaComponent,
		DetallePersonaComponent,
  ],
  imports: [
    AppRoutingModule,
    HttpClientModule,
    CommonModule,
    FontAwesomeModule,
    AppMaterialModule,
    AppLibreriasModule,
    SidebarjsModule.forRoot()
  ],
  providers: [ConstantsService],
  bootstrap: [AppComponent]
})
export class AppModule {
  constructor(library: FaIconLibrary) {
    library.addIconPacks(fas);
  }
}

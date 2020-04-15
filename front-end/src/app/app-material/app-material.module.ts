import {MatTabsModule} from '@angular/material/tabs';
import {BrowserModule} from '@angular/platform-browser';
import {MatSidenavModule} from '@angular/material/sidenav';
import {MatFormFieldModule} from '@angular/material/form-field';
import {NgModule} from '@angular/core';
import {MatButtonModule} from '@angular/material/button';
import {MatSelectModule} from '@angular/material/select';
import {MatInputModule} from '@angular/material/input';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {FormsModule,ReactiveFormsModule} from '@angular/forms';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatIconModule} from '@angular/material/icon';
import {MatListModule} from '@angular/material/list';
import {MatDialogModule} from '@angular/material/dialog';
import {MatAutocompleteModule} from '@angular/material/autocomplete';
import {MatStepperModule} from '@angular/material/stepper';


@NgModule({
	declarations: [],
	imports: [
		MatFormFieldModule,
		MatSidenavModule,
		MatButtonModule,
		MatSelectModule,
		MatInputModule,
		BrowserModule,
		BrowserAnimationsModule,
		FormsModule,
		MatToolbarModule,
		MatIconModule,
		MatListModule,
		MatDialogModule,
		MatTabsModule,
		ReactiveFormsModule,
		MatAutocompleteModule,
		MatStepperModule,
	],
	exports: [
		MatFormFieldModule,
		MatSidenavModule,
		MatButtonModule,
		MatSelectModule,
		MatInputModule,
		BrowserModule,
		BrowserAnimationsModule,
		FormsModule,
		MatToolbarModule,
		MatIconModule,
		MatListModule,
		MatDialogModule,
		MatTabsModule,
		ReactiveFormsModule,
		MatAutocompleteModule,
		MatStepperModule
	]
})
export class AppMaterialModule {
}

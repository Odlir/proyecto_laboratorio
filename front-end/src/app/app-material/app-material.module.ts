import {BrowserModule} from '@angular/platform-browser';
import {MatSidenavModule} from '@angular/material/sidenav';
import {MatTableModule} from '@angular/material/table';
import {MatFormFieldModule} from '@angular/material/form-field';
import {NgModule} from '@angular/core';
import {MatButtonModule} from '@angular/material/button';
import {MatSelectModule} from '@angular/material/select';
import {MatInputModule} from '@angular/material/input';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {FormsModule} from '@angular/forms';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatIconModule} from '@angular/material/icon';
import {MatListModule} from '@angular/material/list';

@NgModule({
	declarations: [],
	imports: [
		MatFormFieldModule,
		MatTableModule,
		MatSidenavModule,
		MatButtonModule,
		MatSelectModule,
		MatInputModule,
		BrowserModule,
		BrowserAnimationsModule,
		FormsModule,
		MatToolbarModule,
		MatIconModule,
		MatListModule
	],
	exports: [
		MatFormFieldModule,
		MatTableModule,
		MatSidenavModule,
		MatButtonModule,
		MatSelectModule,
		MatInputModule,
		BrowserModule,
		BrowserAnimationsModule,
		FormsModule,
		MatToolbarModule,
		MatIconModule,
		MatListModule
	]
})
export class AppMaterialModule {
}

import { NgModule } from '@angular/core';
import { MatTabsModule } from '@angular/material/tabs';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatButtonModule } from '@angular/material/button';
import { MatSelectModule } from '@angular/material/select';
import { MatInputModule } from '@angular/material/input';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatIconModule } from '@angular/material/icon';
import { MatListModule } from '@angular/material/list';
import { MatDialogModule } from '@angular/material/dialog';
import { MatAutocompleteModule } from '@angular/material/autocomplete';
import { MatStepperModule } from '@angular/material/stepper';
import { MatProgressBarModule } from '@angular/material/progress-bar';

@NgModule({
	declarations: [],
	imports: [
		MatFormFieldModule,
		MatSidenavModule,
		MatButtonModule,
		MatSelectModule,
		MatInputModule,

		MatToolbarModule,
		MatIconModule,
		MatListModule,
		MatDialogModule,
		MatTabsModule,

		MatAutocompleteModule,
		MatStepperModule,

		MatProgressBarModule
	],
	exports: [
		MatFormFieldModule,
		MatSidenavModule,
		MatButtonModule,
		MatSelectModule,
		MatInputModule,

		MatToolbarModule,
		MatIconModule,
		MatListModule,
		MatDialogModule,
		MatTabsModule,

		MatAutocompleteModule,
		MatStepperModule,

		MatProgressBarModule
	]
})
export class AppMaterialModule {
}

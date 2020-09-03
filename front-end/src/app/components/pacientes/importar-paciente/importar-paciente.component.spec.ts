import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ImportarPacienteComponent } from './importar-paciente.component';

describe('ImportarPacienteComponent', () => {
  let component: ImportarPacienteComponent;
  let fixture: ComponentFixture<ImportarPacienteComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ImportarPacienteComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ImportarPacienteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudPacienteComponent } from './crud-paciente.component';

describe('CrudPacienteComponent', () => {
  let component: CrudPacienteComponent;
  let fixture: ComponentFixture<CrudPacienteComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudPacienteComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudPacienteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

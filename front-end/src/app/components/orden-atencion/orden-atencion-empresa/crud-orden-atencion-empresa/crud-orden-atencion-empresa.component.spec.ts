import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudOrdenAtencionEmpresaComponent } from './crud-orden-atencion-empresa.component';

describe('CrudOrdenAtencionEmpresaComponent', () => {
  let component: CrudOrdenAtencionEmpresaComponent;
  let fixture: ComponentFixture<CrudOrdenAtencionEmpresaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudOrdenAtencionEmpresaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudOrdenAtencionEmpresaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalleOrdenAtencionEmpresaComponent } from './detalle-orden-atencion-empresa.component';

describe('DetalleOrdenAtencionEmpresaComponent', () => {
  let component: DetalleOrdenAtencionEmpresaComponent;
  let fixture: ComponentFixture<DetalleOrdenAtencionEmpresaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalleOrdenAtencionEmpresaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalleOrdenAtencionEmpresaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

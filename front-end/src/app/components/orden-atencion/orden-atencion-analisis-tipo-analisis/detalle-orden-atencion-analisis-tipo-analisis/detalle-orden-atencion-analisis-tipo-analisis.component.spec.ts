import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalleOrdenAtencionAnalisisTipoAnalisisComponent } from './detalle-orden-atencion-analisis-tipo-analisis.component';

describe('DetalleOrdenAtencionAnalisisTipoAnalisisComponent', () => {
  let component: DetalleOrdenAtencionAnalisisTipoAnalisisComponent;
  let fixture: ComponentFixture<DetalleOrdenAtencionAnalisisTipoAnalisisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalleOrdenAtencionAnalisisTipoAnalisisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalleOrdenAtencionAnalisisTipoAnalisisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

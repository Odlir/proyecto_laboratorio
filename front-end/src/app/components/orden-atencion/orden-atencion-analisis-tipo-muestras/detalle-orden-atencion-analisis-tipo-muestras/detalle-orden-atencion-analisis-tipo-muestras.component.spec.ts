import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalleOrdenAtencionAnalisisTipoMuestrasComponent } from './detalle-orden-atencion-analisis-tipo-muestras.component';

describe('DetalleOrdenAtencionAnalisisTipoMuestrasComponent', () => {
  let component: DetalleOrdenAtencionAnalisisTipoMuestrasComponent;
  let fixture: ComponentFixture<DetalleOrdenAtencionAnalisisTipoMuestrasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalleOrdenAtencionAnalisisTipoMuestrasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalleOrdenAtencionAnalisisTipoMuestrasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

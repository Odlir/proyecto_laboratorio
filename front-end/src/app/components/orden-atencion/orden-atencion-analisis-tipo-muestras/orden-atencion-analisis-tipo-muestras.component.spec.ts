import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OrdenAtencionAnalisisTipoMuestrasComponent } from './orden-atencion-analisis-tipo-muestras.component';

describe('OrdenAtencionAnalisisTipoMuestrasComponent', () => {
  let component: OrdenAtencionAnalisisTipoMuestrasComponent;
  let fixture: ComponentFixture<OrdenAtencionAnalisisTipoMuestrasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OrdenAtencionAnalisisTipoMuestrasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OrdenAtencionAnalisisTipoMuestrasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

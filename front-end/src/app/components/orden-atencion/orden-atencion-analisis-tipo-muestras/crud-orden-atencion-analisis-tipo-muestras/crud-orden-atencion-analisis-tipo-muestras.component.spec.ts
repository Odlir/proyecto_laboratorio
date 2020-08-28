import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudOrdenAtencionAnalisisTipoMuestrasComponent } from './crud-orden-atencion-analisis-tipo-muestras.component';

describe('CrudOrdenAtencionAnalisisTipoMuestrasComponent', () => {
  let component: CrudOrdenAtencionAnalisisTipoMuestrasComponent;
  let fixture: ComponentFixture<CrudOrdenAtencionAnalisisTipoMuestrasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudOrdenAtencionAnalisisTipoMuestrasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudOrdenAtencionAnalisisTipoMuestrasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

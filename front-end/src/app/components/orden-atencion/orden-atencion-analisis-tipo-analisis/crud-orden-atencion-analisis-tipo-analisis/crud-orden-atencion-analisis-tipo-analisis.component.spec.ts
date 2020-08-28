import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudOrdenAtencionAnalisisTipoAnalisisComponent } from './crud-orden-atencion-analisis-tipo-analisis.component';

describe('CrudOrdenAtencionAnalisisTipoAnalisisComponent', () => {
  let component: CrudOrdenAtencionAnalisisTipoAnalisisComponent;
  let fixture: ComponentFixture<CrudOrdenAtencionAnalisisTipoAnalisisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudOrdenAtencionAnalisisTipoAnalisisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudOrdenAtencionAnalisisTipoAnalisisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

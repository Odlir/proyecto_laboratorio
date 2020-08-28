import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OrdenAtencionAnalisisTipoAnalisisComponent } from './orden-atencion-analisis-tipo-analisis.component';

describe('OrdenAtencionAnalisisTipoAnalisisComponent', () => {
  let component: OrdenAtencionAnalisisTipoAnalisisComponent;
  let fixture: ComponentFixture<OrdenAtencionAnalisisTipoAnalisisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OrdenAtencionAnalisisTipoAnalisisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OrdenAtencionAnalisisTipoAnalisisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

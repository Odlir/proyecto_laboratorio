import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalleOrdenAtencionAnalisisComponent } from './detalle-orden-atencion-analisis.component';

describe('DetalleOrdenAtencionAnalisisComponent', () => {
  let component: DetalleOrdenAtencionAnalisisComponent;
  let fixture: ComponentFixture<DetalleOrdenAtencionAnalisisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalleOrdenAtencionAnalisisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalleOrdenAtencionAnalisisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

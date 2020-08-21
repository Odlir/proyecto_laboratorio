import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalleAnalisisComponent } from './detalle-analisis.component';

describe('DetalleAnalisisComponent', () => {
  let component: DetalleAnalisisComponent;
  let fixture: ComponentFixture<DetalleAnalisisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalleAnalisisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalleAnalisisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

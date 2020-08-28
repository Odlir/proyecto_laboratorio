import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OrdenAtencionAnalisisComponent } from './orden-atencion-analisis.component';

describe('OrdenAtencionAnalisisComponent', () => {
  let component: OrdenAtencionAnalisisComponent;
  let fixture: ComponentFixture<OrdenAtencionAnalisisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OrdenAtencionAnalisisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OrdenAtencionAnalisisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

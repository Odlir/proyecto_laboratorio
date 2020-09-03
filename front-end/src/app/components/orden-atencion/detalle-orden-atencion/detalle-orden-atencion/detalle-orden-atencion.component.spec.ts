import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalleOrdenAtencionComponent } from './detalle-orden-atencion.component';

describe('DetalleOrdenAtencionComponent', () => {
  let component: DetalleOrdenAtencionComponent;
  let fixture: ComponentFixture<DetalleOrdenAtencionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalleOrdenAtencionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalleOrdenAtencionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OrdenAtencionEmpresaComponent } from './orden-atencion-empresa.component';

describe('OrdenAtencionEmpresaComponent', () => {
  let component: OrdenAtencionEmpresaComponent;
  let fixture: ComponentFixture<OrdenAtencionEmpresaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OrdenAtencionEmpresaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OrdenAtencionEmpresaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

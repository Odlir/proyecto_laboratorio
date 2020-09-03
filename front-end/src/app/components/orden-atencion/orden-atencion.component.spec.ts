import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OrdenAtencionComponent } from './orden-atencion.component';

describe('OrdenAtencionComponent', () => {
  let component: OrdenAtencionComponent;
  let fixture: ComponentFixture<OrdenAtencionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OrdenAtencionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OrdenAtencionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

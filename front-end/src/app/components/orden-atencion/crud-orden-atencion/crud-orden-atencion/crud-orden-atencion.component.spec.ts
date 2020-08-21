import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudOrdenAtencionComponent } from './crud-orden-atencion.component';

describe('CrudOrdenAtencionComponent', () => {
  let component: CrudOrdenAtencionComponent;
  let fixture: ComponentFixture<CrudOrdenAtencionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudOrdenAtencionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudOrdenAtencionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudOrdenAtencionAnalisisComponent } from './crud-orden-atencion-analisis.component';

describe('CrudOrdenAtencionAnalisisComponent', () => {
  let component: CrudOrdenAtencionAnalisisComponent;
  let fixture: ComponentFixture<CrudOrdenAtencionAnalisisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudOrdenAtencionAnalisisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudOrdenAtencionAnalisisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

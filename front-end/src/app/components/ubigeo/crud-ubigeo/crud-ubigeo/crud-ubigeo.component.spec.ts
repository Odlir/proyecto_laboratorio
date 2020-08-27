import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudUbigeoComponent } from './crud-ubigeo.component';

describe('CrudUbigeoComponent', () => {
  let component: CrudUbigeoComponent;
  let fixture: ComponentFixture<CrudUbigeoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudUbigeoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudUbigeoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudEmpresaComponent } from './crud-empresa.component';

describe('CrudEmpresaComponent', () => {
  let component: CrudEmpresaComponent;
  let fixture: ComponentFixture<CrudEmpresaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudEmpresaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudEmpresaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

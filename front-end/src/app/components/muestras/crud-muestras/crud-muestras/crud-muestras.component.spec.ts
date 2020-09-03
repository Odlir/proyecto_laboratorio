import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudMuestrasComponent } from './crud-muestras.component';

describe('CrudMuestrasComponent', () => {
  let component: CrudMuestrasComponent;
  let fixture: ComponentFixture<CrudMuestrasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudMuestrasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudMuestrasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

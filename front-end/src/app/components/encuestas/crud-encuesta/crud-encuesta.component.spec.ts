import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudEncuestaComponent } from './crud-encuesta.component';

describe('CrudEncuestaComponent', () => {
  let component: CrudEncuestaComponent;
  let fixture: ComponentFixture<CrudEncuestaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudEncuestaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudEncuestaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

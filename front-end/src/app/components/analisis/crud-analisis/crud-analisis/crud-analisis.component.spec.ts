import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudAnalisisComponent } from './crud-analisis.component';

describe('CrudAnalisisComponent', () => {
  let component: CrudAnalisisComponent;
  let fixture: ComponentFixture<CrudAnalisisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudAnalisisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudAnalisisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

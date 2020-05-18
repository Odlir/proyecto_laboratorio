import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MenosDesarrolladosComponent } from './menos-desarrollados.component';

describe('MenosDesarrolladosComponent', () => {
  let component: MenosDesarrolladosComponent;
  let fixture: ComponentFixture<MenosDesarrolladosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MenosDesarrolladosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MenosDesarrolladosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

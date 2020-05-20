import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MasDesarrolladosComponent } from './mas-desarrollados.component';

describe('MasDesarrolladosComponent', () => {
  let component: MasDesarrolladosComponent;
  let fixture: ComponentFixture<MasDesarrolladosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MasDesarrolladosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MasDesarrolladosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

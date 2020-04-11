import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CrudPersonaComponent } from './crud-persona.component';

describe('CrudPersonaComponent', () => {
  let component: CrudPersonaComponent;
  let fixture: ComponentFixture<CrudPersonaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CrudPersonaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CrudPersonaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

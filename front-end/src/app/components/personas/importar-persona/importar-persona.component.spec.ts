import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ImportarPersonaComponent } from './importar-persona.component';

describe('ImportarPersonaComponent', () => {
  let component: ImportarPersonaComponent;
  let fixture: ComponentFixture<ImportarPersonaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ImportarPersonaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ImportarPersonaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

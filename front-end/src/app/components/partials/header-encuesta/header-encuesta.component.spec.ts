import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderEncuestaComponent } from './header-encuesta.component';

describe('HeaderEncuestaComponent', () => {
  let component: HeaderEncuestaComponent;
  let fixture: ComponentFixture<HeaderEncuestaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HeaderEncuestaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HeaderEncuestaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EspecificosComponent } from './especificos.component';

describe('EspecificosComponent', () => {
  let component: EspecificosComponent;
  let fixture: ComponentFixture<EspecificosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EspecificosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EspecificosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

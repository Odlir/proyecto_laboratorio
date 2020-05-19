import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EspecificosMenosComponent } from './especificos-menos.component';

describe('EspecificosMenosComponent', () => {
  let component: EspecificosMenosComponent;
  let fixture: ComponentFixture<EspecificosMenosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EspecificosMenosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EspecificosMenosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

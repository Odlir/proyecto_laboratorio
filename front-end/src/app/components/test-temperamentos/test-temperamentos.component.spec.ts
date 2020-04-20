import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TestTemperamentosComponent } from './test-temperamentos.component';

describe('TestTemperamentosComponent', () => {
  let component: TestTemperamentosComponent;
  let fixture: ComponentFixture<TestTemperamentosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TestTemperamentosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TestTemperamentosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

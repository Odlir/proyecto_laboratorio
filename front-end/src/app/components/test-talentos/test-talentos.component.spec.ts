import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TestTalentosComponent } from './test-talentos.component';

describe('TestTalentosComponent', () => {
  let component: TestTalentosComponent;
  let fixture: ComponentFixture<TestTalentosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TestTalentosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TestTalentosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

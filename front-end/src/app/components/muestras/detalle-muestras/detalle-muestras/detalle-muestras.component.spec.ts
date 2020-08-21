import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalleMuestrasComponent } from './detalle-muestras.component';

describe('DetalleMuestrasComponent', () => {
  let component: DetalleMuestrasComponent;
  let fixture: ComponentFixture<DetalleMuestrasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalleMuestrasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalleMuestrasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

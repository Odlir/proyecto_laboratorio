import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalleSucursalComponent } from './detalle-sucursal.component';

describe('DetalleSucursalComponent', () => {
  let component: DetalleSucursalComponent;
  let fixture: ComponentFixture<DetalleSucursalComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalleSucursalComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalleSucursalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

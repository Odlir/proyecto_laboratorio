import { TestBed } from '@angular/core/testing';

import { ApiBackRequestService } from './api-back-request.service';

describe('ApiBackRequestService', () => {
  let service: ApiBackRequestService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ApiBackRequestService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});

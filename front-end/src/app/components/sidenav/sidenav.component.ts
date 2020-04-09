import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.css']
})
export class SidenavComponent implements OnInit {
  constructor() { }

  ngOnInit(): void {
  }

  public onOpen() {
    console.log('open');
  }

  public onClose() {
    console.log('close');
  }

  public onChangeVisibility(event) {
    console.log('change visibility', event);
  }

}

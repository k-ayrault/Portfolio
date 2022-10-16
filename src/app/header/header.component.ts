import {Component, Input, OnInit} from '@angular/core';
import {Personne} from "../models/personne.models";

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  @Input() personne!:Personne;

  constructor() { }

  ngOnInit(): void {
  }

}

import {Component, Input, OnInit} from '@angular/core';
import {Personne} from "../models/personne.models";
import {PersonneService} from "../services/personne.service";

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  navOpen: Boolean = false;
  personne!:Personne;

  constructor(private personneService:PersonneService) { }

  ngOnInit(): void {
    this.personne = this.personneService.getPersonne();
  }

  closeMenuOnChangePage() {
    if (this.navOpen) {
      this.navOpen = false;
    }
  }
}

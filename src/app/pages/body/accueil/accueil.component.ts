import { Component, OnInit } from '@angular/core';
import {Personne} from "../../../models/personne.models";
import {PersonneService} from "../../../services/personne.service";

@Component({
  selector: 'app-accueil',
  templateUrl: './accueil.component.html',
  styleUrls: ['./accueil.component.scss']
})
export class AccueilComponent implements OnInit {
  personne!:Personne;

  constructor(private personneService:PersonneService) { }

  ngOnInit(): void {
    this.personne = this.personneService.getPersonne();
  }

}

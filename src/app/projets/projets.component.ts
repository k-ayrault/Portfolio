import { Component, OnInit } from '@angular/core';
import {Projet} from "../models/projet.models";
import {PersonneService} from "../services/personne.service";

@Component({
  selector: 'app-projets',
  templateUrl: './projets.component.html',
  styleUrls: ['./projets.component.scss']
})
export class ProjetsComponent implements OnInit {

  projets!:Projet[];

  constructor(private personneService:PersonneService) { }

  ngOnInit(): void {
    this.projets = this.personneService.getProjets();
  }

}

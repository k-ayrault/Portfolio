import { Component, OnInit } from '@angular/core';
import {PersonneService} from "../services/personne.service";
import {Competences} from "../models/competences.models";

@Component({
  selector: 'app-presentation-a-skills',
  templateUrl: './competences.component.html',
  styleUrls: ['./competences.component.scss']
})
export class CompetencesComponent implements OnInit {

  competences!:Competences;
  constructor(private personneService:PersonneService) { }

  ngOnInit(): void {
    this.competences = this.personneService.getCompetences();
  }

}

import { Component, OnInit } from '@angular/core';
import {PersonneService} from "../services/personne.service";
import {Competences} from "../models/competences.models";

@Component({
  selector: 'app-presentation-skills',
  templateUrl: './presentation-skills.component.html',
  styleUrls: ['./presentation-skills.component.scss']
})
export class PresentationSkillsComponent implements OnInit {

  competences!:Competences;
  constructor(private personneService:PersonneService) { }

  ngOnInit(): void {
    this.competences = this.personneService.getCompetences();
  }

}

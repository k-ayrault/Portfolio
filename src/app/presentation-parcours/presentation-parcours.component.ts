import { Component, OnInit } from '@angular/core';
import {Experience} from "../models/experience.models";
import {PersonneService} from "../services/personne.service";

@Component({
  selector: 'app-presentation-parcours',
  templateUrl: './presentation-parcours.component.html',
  styleUrls: ['./presentation-parcours.component.scss']
})
export class PresentationParcoursComponent implements OnInit {
  experiences!:Experience[];

  constructor(private personneService:PersonneService) { }

  ngOnInit(): void {
    this.experiences = this.personneService.getParcours();
  }

}

import { Component, OnInit } from '@angular/core';
import {Experience} from "../../../../models/experience.models";
import {PersonneService} from "../../../../services/personne.service";

@Component({
  selector: 'app-parcours',
  templateUrl: './parcours.component.html',
  styleUrls: ['./parcours.component.scss']
})
export class ParcoursComponent implements OnInit {
  experiences!:Experience[];

  constructor(private personneService:PersonneService) { }

  ngOnInit(): void {
    this.experiences = this.personneService.getParcours();
  }

}

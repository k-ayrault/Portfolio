import { Component, OnInit } from '@angular/core';
import {Personne} from "../../../models/personne.models";
import {PersonneService} from "../../../services/personne.service";

@Component({
  selector: 'app-presentation',
  templateUrl: './presentation.component.html',
  styleUrls: ['./presentation.component.scss']
})
export class PresentationComponent implements OnInit {
  personne!:Personne;

  constructor(private personneService: PersonneService) { }

  ngOnInit(): void {
    this.personne = this.personneService.getPersonne();
  }
}

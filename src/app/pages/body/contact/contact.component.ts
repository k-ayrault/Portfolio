import { Component, OnInit } from '@angular/core';
import {PersonneService} from "../../../services/personne.service";
import {Personne} from "../../../models/personne.models";

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  personne!:Personne;

  constructor(private personneService:PersonneService) { }

  ngOnInit(): void {
    this.personne = this.personneService.getPersonne();
  }

}

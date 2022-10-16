import {Component, OnInit} from '@angular/core';
import {Personne} from "./models/personne.models";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {

  personne!:Personne;

  constructor() {}

  ngOnInit(): void {

    this.personne = {
      nom: "Ayrault",
      prenom: "Kévin",
      img: "../assets/Images/photo.jpg",
      age: this.getAge(new Date(2001,9,26)),
      metier: "Développeur Web",
    };
  }

  private getAge(aniv:Date) {
    let auj:Date = new Date();
    let age:number = auj.getFullYear() - aniv.getFullYear();
    let diffMois:number = auj.getMonth() - aniv.getMonth();

    if (diffMois < 0 || (diffMois === 0 && auj.getDate() < aniv.getDate())) age--;

    return age;
  }

}

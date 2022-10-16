import {Injectable} from "@angular/core";
import {Personne} from "../models/personne.models";

@Injectable({
  providedIn: 'root'
})
export class PersonneService {
  personne:Personne = {
    nom: "Ayrault",
    prenom: "Kévin",
    img: "../assets/Images/photo.jpg",
    age: this.getAge(new Date(2001,9,26)),
    metier: "Développeur Web",
  };

  getPersonne(): Personne {
    return this.personne;
  }

  private getAge(aniv:Date) {
    let auj:Date = new Date();
    let age:number = auj.getFullYear() - aniv.getFullYear();
    let diffMois:number = auj.getMonth() - aniv.getMonth();

    if (diffMois < 0 || (diffMois === 0 && auj.getDate() < aniv.getDate())) age--;

    return age;
  }
}

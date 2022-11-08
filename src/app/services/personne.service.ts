import {Injectable} from "@angular/core";
import {Personne} from "../models/personne.models";
import {Competences} from "../models/competences.models";
import {Experience} from "../models/experience.models";
import {Projet} from "../models/projet.models";
import * as dataPersonne from "../../personne.json";

@Injectable({
  providedIn: 'root'
})
export class PersonneService {
  personne!: Personne;

  constructor() {
    this.personne = this.loadPersonne(dataPersonne);
  }

  getPersonne(): Personne {
    return this.personne;
  }

  getCompetences(): Competences {
    return this.personne.competences;
  }

  getParcours(): Experience[] {
    return this.personne.experiences.sort((a,b) => b.annees[0] - a.annees[0]);
  }

  getProjets(): Projet[] {
    return this.personne.projets;
  }

  getProjet(projetId:number):Projet {
    const projet = this.personne.projets.find(p => p.id === projetId);

    if (!projet) {
      throw new Error('Projet inexistant');
    }

    return projet;

  }

  private getAge(aniv: Date) {
    let auj: Date = new Date();
    let age: number = auj.getFullYear() - aniv.getFullYear();
    let diffMois: number = auj.getMonth() - aniv.getMonth();

    if (diffMois < 0 || (diffMois === 0 && auj.getDate() < aniv.getDate())) age--;

    return age;
  }

  private loadPersonne(json:any): Personne {
    return {
      nom: json.nom,
      prenom: json.prenom,
      img: json.img,
      dateNaissance: new Date(json.dateNaissance),
      age: this.getAge(new Date(json.dateNaissance)),
      situation: json.situation,
      ville: {
        nom: json.ville.nom,
        pays: json.ville.pays
      },
      niveauEtude: {
        niveau: json.niveauEtude.niveau,
        nomDiplome: json.niveauEtude.nomDiplome
      },
      description: json.description,
      metier: json.metier,
      competences: {
        back: json.competences.back,
        front: json.competences.front,
        donnees: json.competences.donnees,
        autres: json.competences.autres,
        outils: json.competences.outils,
        logiciels: json.competences.logiciels
      },
      experiences: json.experiences,
      contacts: json.contacts,
      reseaux: json.reseaux,
      projets: json.projets.map((p:any, i:number) => {
        p.debut = new Date(p.debut);
        p.fin = new Date(p.fin);
        return p;
      })
    };
  }
}

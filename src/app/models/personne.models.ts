import {Competences} from "./competences.models";
import {Experience} from "./experience.models";
import {Contact} from "./contact.models";
import {NiveauEtude} from "./niveau-etude.models";
import {Ville} from "./ville.models";
import {Projet} from "./projet.models";

export class Personne {
  nom!:string;
  prenom!:string;
  img!:string;
  dateNaissance!:Date;
  age!:number;
  situation!:string;
  ville!:Ville;
  niveauEtude!: NiveauEtude;
  description!: string;
  metier!:string;
  competences!:Competences;
  experiences!:Experience[];
  contacts!:Contact[];
  projets!: Projet[];
}

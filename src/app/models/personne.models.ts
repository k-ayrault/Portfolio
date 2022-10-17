import {Competences} from "./competences.models";

export class Personne {
  nom!:string;
  prenom!:string;
  img!:string;
  age!:number;
  metier!:string;
  competences!:Competences;
}

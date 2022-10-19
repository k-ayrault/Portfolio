import {Competences} from "./competences.models";
import {Experience} from "./experience.models";
import {Contact} from "./contact.models";

export class Personne {
  nom!:string;
  prenom!:string;
  img!:string;
  dateNaissance!:Date;
  age!:number;
  metier!:string;
  competences!:Competences;
  experiences!:Experience[];
  contacts!:Contact[];
}

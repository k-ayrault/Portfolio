import {CompetencesTechno} from "./competences-techno.models";
import {Collaborateur} from "./collaborateur.models";
import {Reseau} from "./reseau.models";

export class Projet {
  id!:number;
  titre!: string;
  debut!: Date;
  fin!: Date;
  couverture!:string;
  presentation!: string;
  description!: string;
  images!: string[];
  technologies!: CompetencesTechno[];
  collaborateurs!: Collaborateur[];
  reseaux!: Reseau[];
}

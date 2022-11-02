import { Component, OnInit } from '@angular/core';
import {PersonneService} from "../../../../services/personne.service";
import {Projet} from "../../../../models/projet.models";
import {ActivatedRoute, Router} from "@angular/router";

@Component({
  selector: 'app-presentation-projet',
  templateUrl: './presentation-projet.component.html',
  styleUrls: ['./presentation-projet.component.scss']
})
export class PresentationProjetComponent implements OnInit {

  projet!:Projet;

  constructor(private personneService:PersonneService, private route:ActivatedRoute, private router:Router) { }

  ngOnInit(): void {
    const projetId: number = +this.route.snapshot.params['id'];
    try {
      this.projet = this.personneService.getProjet(projetId);
    } catch (e) {
      this.router.navigateByUrl('/projets');
    }
  }

}

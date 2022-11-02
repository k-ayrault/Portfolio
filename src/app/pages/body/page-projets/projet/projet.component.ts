import {Component, Input, OnInit} from '@angular/core';
import {Projet} from "../../../../models/projet.models";
import {Router} from "@angular/router";

@Component({
  selector: 'app-projet',
  templateUrl: './projet.component.html',
  styleUrls: ['./projet.component.scss']
})
export class ProjetComponent implements OnInit {

  @Input() projet!: Projet;
  constructor(private router:Router) { }

  ngOnInit(): void {
    console.log(this.projet)
  }

  presentationProjet() {
    this.router.navigateByUrl(`/projets/${this.projet.id}`)
  }
}

import {Component, Input, OnInit} from '@angular/core';
import {Projet} from "../models/projet.models";

@Component({
  selector: 'app-projet',
  templateUrl: './projet.component.html',
  styleUrls: ['./projet.component.scss']
})
export class ProjetComponent implements OnInit {

  @Input() projet!: Projet;
  constructor() { }

  ngOnInit(): void {
    console.log(this.projet)
  }

}

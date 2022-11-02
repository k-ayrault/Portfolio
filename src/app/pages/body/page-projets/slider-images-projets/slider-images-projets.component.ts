import {Component, Input, OnInit} from '@angular/core';
import {interval, Subscription} from "rxjs";

@Component({
  selector: 'app-slider-images-projets',
  templateUrl: './slider-images-projets.component.html',
  styleUrls: ['./slider-images-projets.component.scss']
})
export class SliderImagesProjetsComponent implements OnInit {
  @Input() images!: string[];
  private nbreImageL!:number;
  private nbreImageR!:number;
  private subscriptionChangeImage!:Subscription;
  indexActive!:number;
  indexLeft:number[] = [];
  indexRight:number[] = [];
  constructor() { }



  ngOnInit(): void {
    this.indexActive = 0;
    if ((this.images.length - 1) % 2 == 0) {
      this.nbreImageL = (this.images.length - 1) / 2;
      this.nbreImageR = this.nbreImageL;
    } else {
      this.nbreImageL = Math.floor((this.images.length - 1) / 2);
      this.nbreImageR = this.nbreImageL + 1;
    }

    this.getIndexLeftAndRight();

    const source = interval(10000);
    this.subscriptionChangeImage = source.subscribe(val => this.changeImage());
  }

  private changeImage(next:boolean = false) {
    if (next) {
      if (this.indexActive < this.images.length - 1) {
        this.indexActive++;
      } else {
        this.indexActive = 0;
      }
    } else {
      if (this.indexActive > 0) {
        this.indexActive--;
      } else {
        this.indexActive = this.images.length - 1;
      }
    }
    this.getIndexLeftAndRight();
  }

  private getIndexLeftAndRight() {
    let firstIndex:number = 0 ;
    let lastIndex:number = this.images.length - 1;
    let nbreElementAvantActif: number = firstIndex + this.indexActive;
    let nbreElementApresActif:number = lastIndex - this.indexActive;
    if (this.nbreImageL == nbreElementAvantActif) {
      this.indexLeft = Array.from({length: this.nbreImageL}, (_, i ) => this.indexActive - 1 - i);
      this.indexLeft.sort(function(a:number, b:number):number {
        return a - b;
      });
      this.indexRight = Array.from({length: this.nbreImageR}, (_, i ) => this.indexActive + 1 + i);
    } else if (this.nbreImageL < nbreElementAvantActif) {
      this.indexLeft = Array.from({length: this.nbreImageL}, (_, i ) => this.indexActive - 1 - i);
      this.indexLeft.sort(function(a:number, b:number):number {
        return a - b;
      });
      this.indexRight = Array.from(this.images.keys()).filter((el:number):boolean => {
        return !this.indexLeft.includes(el) && el != this.indexActive;
      });
    } else {
      this.indexRight = Array.from({length: this.nbreImageR}, (_, i ) => this.indexActive + 1 + i);
      this.indexRight.sort(function(a:number, b:number):number {
        return a - b;
      });
      this.indexLeft = Array.from(this.images.keys()).filter((el:number):boolean => {
        return !this.indexRight.includes(el) && el != this.indexActive;
      });
    }
  }

}

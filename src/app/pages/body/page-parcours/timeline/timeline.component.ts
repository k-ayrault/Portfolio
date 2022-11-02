import {Component, Input, OnInit} from '@angular/core';
import {Element} from "@angular/compiler";
import {Experience} from "../../../../models/experience.models";

@Component({
  selector: 'app-timeline',
  templateUrl: './timeline.component.html',
  styleUrls: ['./timeline.component.scss']
})
export class TimelineComponent implements OnInit {
  @Input() position!:number;
  @Input() experience!:Experience;
  private showDescr:Boolean = false;
  private classDescr: string = "timeline-content-descr";
  private classShowHide:string = "timeline-content-show-hide";
  private classHide:string = "timeline-content-hide";

  constructor() { }

  ngOnInit(): void {
  }

  showHideDescr(event:Event) {
    if (event.currentTarget instanceof HTMLElement) {
      const target:HTMLElement = event.currentTarget;
      const descr:HTMLElement = target.querySelector("."+this.classDescr)!;
      const showHideLogo:HTMLElement = target.querySelector("."+this.classShowHide)!;

      if (this.showDescr) {
        descr.style.display = 'none';
        showHideLogo.classList.remove(this.classHide);
        this.showDescr = false;
      }
      else {
        descr.style.display = 'block';
        showHideLogo.classList.add(this.classHide);
        this.showDescr = true;
      }
    }
  }
}

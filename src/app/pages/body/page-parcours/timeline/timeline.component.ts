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
  show:boolean = false;
  private showDescr:Boolean = false;
  private classDescr: string = "timeline-content-descr";
  private classShowHide:string = "timeline-content-show-hide";
  private classHide:string = "timeline-content-hide";

  constructor() { }

  ngOnInit(): void {
  }

  showHideDescr(event:Event) {
    this.show = !this.show;
  }
}

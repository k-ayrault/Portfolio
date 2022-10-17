import { Component, OnInit } from '@angular/core';
import {Element} from "@angular/compiler";

@Component({
  selector: 'app-presentation',
  templateUrl: './presentation.component.html',
  styleUrls: ['./presentation.component.scss']
})
export class PresentationComponent implements OnInit {

  private activePageClassName:string = "presentation-page-active";

  constructor() { }

  ngOnInit(): void {
  }

  onScroll(event:WheelEvent) {
    let scroll = event.deltaY;
    let elementActive:HTMLElement = document.querySelector("."+ this.activePageClassName)!;
    let nextActiveElement;
    if (scroll > 0) {
      nextActiveElement = elementActive?.nextElementSibling;
    } else if (scroll < 0) {
      nextActiveElement = elementActive?.previousElementSibling;
    }
    if (elementActive && nextActiveElement && nextActiveElement instanceof HTMLElement) {
      this.changeActivePage(elementActive, nextActiveElement);
    }
  }

  private xTouch:number = 0;
  private yTouch:number = 0;

  handleTouchStart(event:TouchEvent) {
    const firstTouch = event.touches[0];
    this.xTouch = firstTouch.clientX;
    this.yTouch = firstTouch.clientY;
  }

  handleTouchMove(event:TouchEvent) {
    if ( ! this.xTouch || ! this.yTouch ) {
      return;
    }

    let xUp = event.changedTouches[event.changedTouches.length-1].clientX;
    let yUp = event.changedTouches[event.changedTouches.length-1].clientY;

    let xDiff = this.xTouch - xUp;
    let yDiff = this.yTouch - yUp;

    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
      let elementActive:HTMLElement = document.querySelector("."+ this.activePageClassName)!;
      let nextActiveElement;
      if ( xDiff > 0 ) {
        /* right swipe */
        nextActiveElement = elementActive?.nextElementSibling;
      } else {
        /* left swipe */
        nextActiveElement = elementActive?.previousElementSibling;
      }

      if (elementActive && nextActiveElement && nextActiveElement instanceof HTMLElement) {
        this.changeActivePage(elementActive, nextActiveElement);
      }
    }

    /* reset values */
    this.xTouch = 0;
    this.yTouch = 0;
  };

  onClickDotChangeActivePage(event:Event) {
    if (!(event.target instanceof HTMLElement)) {
      return;
    }
    const dot: HTMLElement = event.target;
    let idNextActivePage: string;
    idNextActivePage = dot.dataset["page"] ? dot.dataset["page"] : "";
    let elementActive:HTMLElement = document.querySelector("."+ this.activePageClassName)!;
    let nextActiveElement:HTMLElement | null = document.getElementById(idNextActivePage);

    if (elementActive && nextActiveElement) {
      this.changeActivePage(elementActive, nextActiveElement);
    }

  }

  private changeActivePage(elementActive: HTMLElement, nextActiveElement: HTMLElement) {
    if (nextActiveElement) {
      elementActive?.classList.remove(this.activePageClassName);
      nextActiveElement.classList.add(this.activePageClassName);
      let dotActive = document.querySelector('.dot-active');
      if (dotActive) {
        let nextDotActive = document.querySelector('span[class=dot][data-page="' + nextActiveElement.id + '"]');
        if (nextDotActive) {
          dotActive.classList.remove('dot-active');
          nextDotActive?.classList.add('dot-active');
        }
      }
    }
  }
}

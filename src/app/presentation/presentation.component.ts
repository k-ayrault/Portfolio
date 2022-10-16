import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-presentation',
  templateUrl: './presentation.component.html',
  styleUrls: ['./presentation.component.scss']
})
export class PresentationComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  onScroll(event:WheelEvent) {
    let activePageClassName = "presentation-page-active";
    let scroll = event.deltaY;
    let elementActive = document.querySelector("."+activePageClassName);
    let nextActiveElement = null;
    if (scroll > 0) {
      nextActiveElement = elementActive?.nextElementSibling;
    } else if (scroll < 0) {
      nextActiveElement = elementActive?.previousElementSibling;
    }

    if (nextActiveElement) {
      nextActiveElement.classList.add(activePageClassName);
      elementActive?.classList.remove(activePageClassName);
      let dotActive = document.querySelector('.dot-active');
      if (dotActive) {
        let nextDotActive = document.querySelector('span[class=dot][data-page="' + nextActiveElement.id + '"]');
        console.log('span[class=dot][data-page="' + nextActiveElement.id + '"]');
        nextDotActive?.classList.add('dot-active');
        dotActive.classList.remove('dot-active');
      }
    }
  }
}

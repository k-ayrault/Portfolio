import { NgModule, LOCALE_ID } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './pages/header/header.component';
import { AccueilComponent } from './pages/body/accueil/accueil.component';
import { PresentationComponent } from './pages/body/presentation/presentation.component';
import { ProjetsComponent } from './pages/body/page-projets/projets/projets.component';
import { ContactComponent } from './pages/body/contact/contact.component';
import { CompetencesComponent } from './pages/body/competences/competences.component';
import { ParcoursComponent } from './pages/body/page-parcours/parcours/parcours.component';
import { TimelineComponent } from './pages/body/page-parcours/timeline/timeline.component';

import * as fr from '@angular/common/locales/fr';
import {registerLocaleData} from "@angular/common";
import { ProjetComponent } from './pages/body/page-projets/projet/projet.component';
import { PresentationProjetComponent } from './pages/body/page-projets/presentation-projet/presentation-projet.component';
import { SliderImagesProjetsComponent } from './pages/body/page-projets/slider-images-projets/slider-images-projets.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    AccueilComponent,
    PresentationComponent,
    ProjetsComponent,
    ContactComponent,
    CompetencesComponent,
    ParcoursComponent,
    TimelineComponent,
    ProjetComponent,
    PresentationProjetComponent,
    SliderImagesProjetsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [
    { provide: LOCALE_ID, useValue: 'fr-FR'}
  ],
  bootstrap: [AppComponent]
})
export class AppModule {
  constructor() {
    registerLocaleData(fr.default)
  }
}

import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {AccueilComponent} from "./accueil/accueil.component";
import {PresentationComponent} from "./presentation/presentation.component";
import {ProjetsComponent} from "./projets/projets.component";
import {ContactComponent} from "./contact/contact.component";
import {ParcoursComponent} from "./parcours/parcours.component";
import {CompetencesComponent} from "./competences/competences.component";

const routes: Routes = [
  {path: '', component: AccueilComponent},
  {path: 'presentation', component: PresentationComponent},
  {path: 'parcours', component: ParcoursComponent},
  {path: 'competences', component: CompetencesComponent},
  {path: 'projets', component: ProjetsComponent},
  {path: 'contact', component: ContactComponent},
  {path: '**', redirectTo: ''}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

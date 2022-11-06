import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {AccueilComponent} from "./pages/body/accueil/accueil.component";
import {PresentationComponent} from "./pages/body/presentation/presentation.component";
import {ProjetsComponent} from "./pages/body/page-projets/projets/projets.component";
import {ContactComponent} from "./pages/body/contact/contact.component";
import {ParcoursComponent} from "./pages/body/page-parcours/parcours/parcours.component";
import {CompetencesComponent} from "./pages/body/competences/competences.component";
import {PresentationProjetComponent} from "./pages/body/page-projets/presentation-projet/presentation-projet.component";

const routes: Routes = [
  {path: '', component: AccueilComponent},
  {path: 'presentation', component: PresentationComponent},
  {path: 'parcours', component: ParcoursComponent},
  {path: 'competences', component: CompetencesComponent},
  {path: 'projets', component: ProjetsComponent},
  {
    path: 'projets/:id', component: PresentationProjetComponent
  },
  {path: 'contact', component: ContactComponent},
  // {path: '**', redirectTo: ''}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

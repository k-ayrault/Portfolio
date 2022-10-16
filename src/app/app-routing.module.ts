import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {AccueilComponent} from "./accueil/accueil.component";
import {PresentationComponent} from "./presentation/presentation.component";
import {ProjetsComponent} from "./projets/projets.component";
import {ContactComponent} from "./contact/contact.component";

const routes: Routes = [
  {path: '', component: AccueilComponent},
  {path: 'presentation', component: PresentationComponent},
  {path: 'projets', component: ProjetsComponent},
  {path: 'contact', component: ContactComponent},
  {path: '**', redirectTo: ''}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

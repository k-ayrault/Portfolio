import {Component, OnInit} from '@angular/core';
import {PersonneService} from "../../../services/personne.service";
import {Personne} from "../../../models/personne.models";
import {NgForm} from "@angular/forms";
import {MailService} from "../../../services/mail.service";
import {Mail} from "../../../models/mail.models";

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  personne!: Personne;
  mailSend: Boolean = false;

  constructor(private personneService: PersonneService, private mailService: MailService) {
  }

  ngOnInit(): void {
    this.personne = this.personneService.getPersonne();
  }

  sendMail(contactForm: NgForm) {
    if (contactForm.valid) {
      let mail: Mail = contactForm.value;
      this.mailSend = this.mailService.sendMail(mail);
      contactForm.resetForm();
    }
  }



}

import {HttpClient} from "@angular/common/http";
import {Injectable} from "@angular/core";
import {Mail} from "../models/mail.models";

@Injectable({
  providedIn: 'root'
})
export class MailService {
  constructor(private http:HttpClient) {
  }

  sendMail(mail:Mail): boolean {
    let mailSend = false;
    this.http.post<Mail>('/mail/send_mail.php', mail).subscribe({
      next() {
        mailSend = true;
      },
      error() {
        mailSend = false;
      }
    })
    return mailSend;
  }
}

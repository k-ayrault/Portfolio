import {HttpClient} from "@angular/common/http";
import {Injectable} from "@angular/core";
import {Mail} from "../models/mail.models";

@Injectable({
  providedIn: 'root'
})
export class MailService {
  constructor(private http:HttpClient) {
  }

  sendMail(mail:Mail) {

    return this.http.post<Mail>('/mail/send_mail.php', mail)
      .subscribe(
        response => console.log(response),
        response => console.log(response)
      )

  }
}

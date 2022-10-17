import {Injectable} from "@angular/core";
import {Personne} from "../models/personne.models";
import {Competences} from "../models/competences.models";

@Injectable({
  providedIn: 'root'
})
export class PersonneService {
  personne:Personne = {
    nom: "Ayrault",
    prenom: "Kévin",
    img: "../assets/Images/photo.jpg",
    age: this.getAge(new Date(2001,9,26)),
    metier: "Développeur Web",
    competences: {
      back: [
        {
          nom: "Symfony", image : "../assets/Images/back/symfony.png"
        },
        {
          nom: "Node.js", image : "../assets/Images/back/node.png"
        },
        {
          nom: "PHP", image : "../assets/Images/back/php.png"
        },
        {
          nom: "Spring", image : "../assets/Images/back/spring.png"
        }
      ],
      front: [
        {
          nom: "HTML5", image : "../assets/Images/front/html.png"
        },
        {
          nom: "CSS3", image : "../assets/Images/front/css.png"
        },
        {
          nom: "JavaScript", image : "../assets/Images/front/js.png"
        },
        {
          nom: "Angular", image : "../assets/Images/front/angular.png"
        },
        {
          nom: "Bootstrap", image : "../assets/Images/front/bootstrap.png"
        },
      ],
      donnees: [
        {
          nom: "MySQL", image : "../assets/Images/donnees/mysql.png"
        },
        {
          nom: "MariaDB", image : "../assets/Images/donnees/mariadb.png"
        },
      ],
      autres: [
        {
          nom: "Java", image : "../assets/Images/autres/java.png"
        },
        {
          nom: "Python", image : "../assets/Images/autres/python.png"
        },
        {
          nom: "Kotlin", image : "../assets/Images/autres/kotlin.png"
        },
        {
          nom: "C++", image : "../assets/Images/autres/c++.png"
        },
      ],
      outils: [
        {
          nom: "Git", image : "../assets/Images/outils/git.png"
        },
        {
          nom: "PhpMyAdmin", image : "../assets/Images/outils/phpmyadmin.png"
        },
      ],
      logiciels: [
        {
          nom: "Suite JetBrains", image : "../assets/Images/logiciels/jetbrains.png"
        },
        {
          nom: "Android Studio", image : "../assets/Images/logiciels/android_studio.png"
        },
        {
          nom: "Visual Studio", image : "../assets/Images/logiciels/vsc.png"
        },
      ]
    }
  };

  getPersonne(): Personne {
    return this.personne;
  }

  getCompetences():Competences {
    return this.personne.competences;
  }

  private getAge(aniv:Date) {
    let auj:Date = new Date();
    let age:number = auj.getFullYear() - aniv.getFullYear();
    let diffMois:number = auj.getMonth() - aniv.getMonth();

    if (diffMois < 0 || (diffMois === 0 && auj.getDate() < aniv.getDate())) age--;

    return age;
  }
}

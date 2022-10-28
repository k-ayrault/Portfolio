import {Injectable} from "@angular/core";
import {Personne} from "../models/personne.models";
import {Competences} from "../models/competences.models";
import {Experience} from "../models/experience.models";
import {Projet} from "../models/projet.models";

@Injectable({
  providedIn: 'root'
})
export class PersonneService {
  personne: Personne = {
    nom: "Ayrault",
    prenom: "Kévin",
    img: "../assets/Images/photo.jpg",
    dateNaissance: new Date(2001,8,26),
    age: this.getAge(new Date(2001, 8, 26)),
    situation: "Actuellement en recherche d'un premier emploi dans le domaine du développement web (Back-End/Full-Stack)" +
      " à la suite de l'obtention de ma licence professionnelle - Développeur d'applications Web et Big Data.",
    ville: {
      nom: "Limoges",
      pays: "🇫🇷"
    },
    niveauEtude: {
      niveau: "Bac +3", nomDiplome: "Licence Professionnelle - Développeur d'applications Web et Big Data",
    },
    description: "Passioné par le développement web, je me suis professionnalisé durant ma licence professionnelle - " +
      "développement d'applications web et big data ...",
    metier: "Développeur Web",
    competences: {
      back: [
        {
          nom: "Symfony", image: "../assets/Images/back/symfony.png"
        },
        {
          nom: "Node.js", image: "../assets/Images/back/node.png"
        },
        {
          nom: "PHP", image: "../assets/Images/back/php.png"
        },
        {
          nom: "Spring", image: "../assets/Images/back/spring.png"
        }
      ],
      front: [
        {
          nom: "HTML5", image: "../assets/Images/front/html.png"
        },
        {
          nom: "CSS3", image: "../assets/Images/front/css.png"
        },
        {
          nom: "JavaScript", image: "../assets/Images/front/js.png"
        },
        {
          nom: "Angular", image: "../assets/Images/front/angular.png"
        },
        {
          nom: "Bootstrap", image: "../assets/Images/front/bootstrap.png"
        },
      ],
      donnees: [
        {
          nom: "MySQL", image: "../assets/Images/donnees/mysql.png"
        },
        {
          nom: "MariaDB", image: "../assets/Images/donnees/mariadb.png"
        },
      ],
      autres: [
        {
          nom: "Java", image: "../assets/Images/autres/java.png"
        },
        {
          nom: "Python", image: "../assets/Images/autres/python.png"
        },
        {
          nom: "Kotlin", image: "../assets/Images/autres/kotlin.png"
        },
        {
          nom: "C++", image: "../assets/Images/autres/c++.png"
        },
      ],
      outils: [
        {
          nom: "Git", image: "../assets/Images/outils/git.png"
        },
        {
          nom: "PhpMyAdmin", image: "../assets/Images/outils/phpmyadmin.png"
        },
      ],
      logiciels: [
        {
          nom: "Suite JetBrains", image: "../assets/Images/logiciels/jetbrains.png"
        },
        {
          nom: "Android Studio", image: "../assets/Images/logiciels/android_studio.png"
        },
        {
          nom: "Visual Studio", image: "../assets/Images/logiciels/vsc.png"
        },
      ]
    },
    experiences: [
      {
        diplome: true,
        nom: 'Diplôme Universitaire des Technologies - Informatique',
        abrev: 'DUT Informatique',
        annees: [2019, 2021],
        etablissement: 'IUT du Limousin',
        ville: 'Limoges',
        pays: '🇫🇷',
        descr: ''
      },
      {
        diplome: true,
        nom: 'Licence Professionnelle - Développeur d\'applications Web et Big Data',
        abrev: 'LP - DWBD',
        annees: [2021, 2022],
        etablissement: 'IUT du Limousin',
        ville: 'Limoges',
        pays: '🇫🇷',
        descr: ''
      },
      {
        diplome: false,
        nom: 'Alternant',
        abrev: 'Alternant',
        annees: [2021, 2022],
        etablissement: 'Université de Limoges',
        ville: 'Limoges',
        pays: '🇫🇷',
        descr: 'Alternance en complément de ma Licence Professionnelle - Développeur d\'applications Web et Big Data où mon projet principal était le développement et l\'évolution d\'une application web traitant la gestion des demandes d\'accès physique des zones à régimes restrictifs des laboratoires de l\'Université de Limoges'
      }
    ],
    contacts: [
      {
        type: "Téléphone", valeur: "07-60-58-64-02"
      },
      {
        type: "E-mail", valeur: "kevin.ayrault87@gmail.com"
      }
    ],
    projets: [
      {
        id: 1,
        debut: new Date(2021,8,1),
        fin: new Date(2022,6,31),
        couverture: "../assets/Images/back/php.png",
        titre: "Développement d'une application de gestion de demande d'accès",
        presentation: "L'Université de Limoges possédant des zones à régimes restrictifs nécessitant une demande d'accès avant de permettre à une personne d'y pénétrer, ...",
        description: "",
        images: [],
        technologies: [
          {
            nom: "PHP", image: "../assets/Images/back/php.png"
          }
        ],
        collaborateurs: [
          {
            nom: "SOUILAH", prenom: "Marc", site: ""
          }
        ],
        reseaux: []
      },
    ]
  };

  getPersonne(): Personne {
    return this.personne;
  }

  getCompetences(): Competences {
    return this.personne.competences;
  }

  getParcours(): Experience[] {
    return this.personne.experiences.sort((a,b) => b.annees[0] - a.annees[0]);
  }

  getProjets(): Projet[] {
    return this.personne.projets;
  }

  private getAge(aniv: Date) {
    let auj: Date = new Date();
    let age: number = auj.getFullYear() - aniv.getFullYear();
    let diffMois: number = auj.getMonth() - aniv.getMonth();

    if (diffMois < 0 || (diffMois === 0 && auj.getDate() < aniv.getDate())) age--;

    return age;
  }
}

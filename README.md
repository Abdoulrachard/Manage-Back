
# Documentation de l'API et des Routes Web

Ce document fournit une description complète des routes API et web disponibles pour cette application. Il détaille les opérations possibles et les paramètres nécessaires pour chaque route.

---

## Routes Web

### **GET /**

Redirige vers la page d'accueil de l'application. Accessible uniquement pour les utilisateurs authentifiés.

### **Dashboard**

#### **GET /dashboard**

Redirige vers le tableau de bord de l'utilisateur connecté. Accessible uniquement pour les utilisateurs authentifiés.

#### **Ressources Dashboard**

- **Actualité**
    - `GET /dashboard/actuality`
    - `POST /dashboard/actuality`
    - `GET /dashboard/actuality/{id}`
    - `PUT /dashboard/actuality/{id}`
    - `DELETE /dashboard/actuality/{id}`

- **Catégories**
    - `GET /dashboard/category`
    - `POST /dashboard/category`
    - `GET /dashboard/category/{id}`
    - `PUT /dashboard/category/{id}`
    - `DELETE /dashboard/category/{id}`

- **Projets**
    - `GET /dashboard/project`
    - `POST /dashboard/project`
    - `GET /dashboard/project/{id}`
    - `PUT /dashboard/project/{id}`
    - `DELETE /dashboard/project/{id}`

- **Équipes**
    - `GET /dashboard/equipe`
    - `POST /dashboard/equipe`
    - `GET /dashboard/equipe/{id}`
    - `PUT /dashboard/equipe/{id}`
    - `DELETE /dashboard/equipe/{id}`

### **Gestion du Profil Utilisateur**

#### **GET /profile**

Affiche la page de profil de l'utilisateur authentifié.

#### **PATCH /profile**

Met à jour les informations du profil de l'utilisateur connecté.

#### **DELETE /profile**

Supprime le compte utilisateur.

---

## Routes API

Les routes API suivantes permettent de récupérer des informations sur les actualités, les équipes et les projets. Toutes les routes sont publiques sauf celles spécifiées avec un middleware d'authentification.

### **Actualités**

#### **GET /api/actuality**

Récupère la liste de toutes les actualités.

Réponse attendue :

```json
[
  {
    "id": 1,
    "title": "Actualité 1",
    "content": "Contenu de l'actualité"
  },
  ...
]
```

#### **GET /api/actuality/{id}**

Récupère une actualité spécifique par son ID.

Réponse attendue :

```json
{
  "id": 1,
  "title": "Actualité 1",
  "content": "Contenu de l'actualité"
}
```

### **Équipes**

#### **GET /api/equipe**

Récupère la liste de toutes les équipes.

Réponse attendue :

```json
[
  {
    "id": 1,
    "name": "Équipe A",
    "members": 10
  },
  ...
]
```

#### **GET /api/equipe/{id}**

Récupère une équipe spécifique par son ID.

Réponse attendue :

```json
{
  "id": 1,
  "name": "Équipe A",
  "members": 10
}
```

### **Projets**

#### **GET /api/project**

Récupère la liste de tous les projets.

Réponse attendue :

```json
[
  {
    "id": 1,
    "name": "Projet A",
    "description": "Description du projet"
  },
  ...
]
```

#### **GET /api/project/{id}**

Récupère un projet spécifique par son ID.

Réponse attendue :

```json
{
  "id": 1,
  "name": "Projet A",
  "description": "Description du projet"
}
```

---

## Authentification (API)

Les routes suivantes nécessitent une authentification via **Sanctum** pour récupérer les informations sur l'utilisateur connecté.

### **GET /api/user**

Récupère les informations de l'utilisateur connecté.

#### Réponse réussie :

```json
{
  "id": 1,
  "name": "Nom Utilisateur",
  "email": "utilisateur@example.com"
}
```

---

## Erreurs

Les erreurs suivantes peuvent être retournées par l'API :

- **400 Bad Request** : Les données envoyées sont incorrectes ou manquantes.
- **401 Unauthorized** : L'utilisateur n'est pas authentifié pour accéder à cette ressource.
- **404 Not Found** : La ressource demandée n'a pas été trouvée.
- **500 Internal Server Error** : Une erreur interne s'est produite sur le serveur.

---

## Installation et Utilisation

1. Clonez le dépôt : `git clone https://github.com/Abdoulrachard/Manage-Back.git`
2. Installez les dépendances : `composer install`
3. Créez votre fichier `.env` : `cp .env.example .env`
4. Générez votre clé d'application : `php artisan key:generate`
5. Lancez le serveur de développement : `php artisan serve`

---

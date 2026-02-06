# 🍽️ Youco'Done – Plateforme de Réservation de Restaurants

## 📌 Description

**Youco'Done** est une plateforme web moderne qui simplifie la connexion entre **gourmets** et **restaurateurs**. Elle permet aux clients de réserver une table rapidement et aux restaurateurs de gérer leurs établissements en toute simplicité.

---

## 🚀 Fonctionnalités Clés

### 👤 Pour les Utilisateurs (Clients & Restaurateurs)

* 🔐 **Authentification sécurisée** : Inscription et connexion via *Laravel Breeze* 
* 👤 **Gestion de profil** : Consultation et modification des informations personnelles

---

### 🍕 Pour les Clients

* 🔍 **Recherche avancée** : Filtrage par ville, type de cuisine, horaires et nom du restaurant
* 📋 **Détails complets** : Menus, photos, avis clients et disponibilités
* ⭐ **Favoris** : Sauvegarde des restaurants préférés pour un accès rapide

---

### 👨‍🍳 Pour les Restaurateurs

* 🏪 **Gestion d’établissement** : CRUD complet (Créer, Lire, Modifier, Supprimer)
* 🧾 **Fiches détaillées** :

  * Capacité d’accueil
  * Horaires d’ouverture
  * Menus et photos

---

### 🛡️ Pour les Administrateurs

* 📊 **Dashboard** : Statistiques sur les inscriptions et les restaurants actifs
* 🛠️ **Modération** : Suppression de restaurants et gestion des rôles
* 🔒 **Contrôle d’accès** : Permissions et rôles via *Spatie Laravel Permission* ou *Gates/Policies*

---

## 🛠️ Stack Technique

* **Framework Backend** : Laravel 11+
* **Frontend** : Blade & Tailwind CSS (Responsive Design)
* **Authentification** : Laravel Breeze 
* **Sécurité & Permissions** : Spatie Laravel Permission / Policies

---

## 📦 Installation

### 1️⃣ Prérequis

* PHP 8.2+
* Composer
* MySQL ou PostgreSQL

---

### 2️⃣ Installation du projet

```bash
composer install
npm install
```

Copiez le fichier d’environnement et configurez la base de données :

```bash
cp .env.example .env
php artisan key:generate
```

---

### 3️⃣ Authentification (Laravel Breeze)

```bash
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
```

---

### 4️⃣ Permissions & Rôles (Spatie Laravel Permission)

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\\Permission\\PermissionServiceProvider"
php artisan migrate
```

Configuration des rôles et permissions via **Policies / Gates** ou le package **Spatie**.

---

### 5️⃣ Storage (Images & Fichiers)

```bash
php artisan storage:link
```

Permet l’accès public aux images des restaurants (menus, photos, etc.).

---

### 6️⃣ Lancer le projet

```bash
php artisan serve
```

---

## 📄 Licence

Ce projet est développé à des fins pédagogiques dans le cadre de la formation **YouCode**.

---

## ✨ Auteur

Projet réalisé par **Lakroune** – Développeur Full‑Stack

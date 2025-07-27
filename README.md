# Symfony AI + Mistral Demo

Un projet de démonstration **Symfony** intégrant **Symfony AI** avec **Mistral AI** pour une interface utilisateur simple de chat.

---

## Table des matières

1. [Description](#description)
2. [Prérequis](#prérequis)
3. [Installation](#installation)
4. [Configuration](#configuration)
5. [Utilisation](#utilisation)
6. [Structure du projet](#structure-du-projet)
7. [License](#license)

---

## Description

Ce projet montre comment :

* Créer une nouvelle application Symfony.
* Installer et configurer le **Symfony AI Bundle**.
* Intégrer **Mistral AI** via clé API.
* Développer une interface web basique pour envoyer des messages à l’IA et afficher la réponse.

---

## Prérequis

* PHP 8.2+
* [Composer](https://getcomposer.org)
* Symfony CLI (optionnel)
* Clé API Mistral (créez-la sur [https://console.mistral.ai](https://console.mistral.ai))

---

## Installation

Clonez ce dépôt :

```bash
git clone https://github.com/grafiti-54/symfony-ai-mistral-api.git
cd symfony-ai-mistral-api
```
OU :

## Nouveau projet

Créez un nouveau projet Symfony :

```bash
symfony new . 

```

Modification de la ligne suivante composer.json : 

```bash
"minimum-stability": "dev",
```

Installez le bundle AI :

```bash
composer require symfony/ai-bundle
```

Installez le bundle Twig :

```bash
composer require symfony/twig-bundle
```

---

## Configuration

1. **Définissez la clé API** dans votre `.env` :

   ```dotenv
   # .env
   MISTRAL_API_KEY=your_mistral_api_key_here
   ```

2. **Créez** (ou modifiez) `config/packages/ai.yaml` :

   ```yaml
   ai:
     platform:
       mistral:
         api_key: '%env(MISTRAL_API_KEY)%'
   ```

3. **Créez** (ou modifiez) `src/Controller/ChatController.php` 

4. **Créez** (ou modifiez) `templates/chat/chat.html.twig` 

---

## Utilisation

1. **Démarrez** le serveur local :

   ```bash
   symfony server:start
   ```

2. **Ouvrez** votre navigateur exemple:
   `http://localhost:8000/ai/chat`
   Vous accéderez à une zone de chat pour poser des questions à Mistral AI.

3. **Envoyez** un message ; la réponse de l’IA s’affichera dynamiquement.

---

## Structure du projet

```
├── config/
│   └── packages/
│       └── ai.yaml      # Config du bundle AI
├── public/
│   └── index.php        # Point d’entrée
├── src/
│   ├── Controller/
│   │   └── ChatController.php  # Contrôleur UI
│   └── Service/
│       └── AIChatService.php   # Service d’appel IA
├── templates/
│   └── chat.html.twig  # Page de chat
└── .env               # Clé Mistral
```

---

## License

MIT © Symfony AI + Mistral Simple Démo

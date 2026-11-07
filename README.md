# User Management Dashboard — Laravel

Dashboard web per la gestione degli utenti, sviluppata con **PHP** e **Laravel 8**.
Dopo il login, l'area riservata permette di visualizzare, aggiungere, modificare ed eliminare utenti (CRUD completo).

> Progetto realizzato durante il mio percorso di formazione come sviluppatrice web.

## Funzionalità

- **Autenticazione** (registrazione, login, logout, reset password) con Laravel Breeze
- **Area riservata** protetta da middleware `auth`
- **CRUD utenti**: lista paginata, creazione, modifica ed eliminazione (con conferma)
- **Validazione** dei dati lato server (email unica, password di almeno 8 caratteri) con messaggi di errore nel form
- **Password cifrate** con `Hash::make` (bcrypt); in modifica la password resta invariata se il campo è vuoto
- **Protezione CSRF** su tutti i form, eliminazione tramite richiesta `DELETE`
- **Test automatici** (PHPUnit) per autenticazione e CRUD
- Interfaccia personalizzata in CSS

## Stack

| | |
|---|---|
| Backend | PHP 8, Laravel 8, Eloquent ORM |
| Frontend | Blade, CSS, Tailwind (pagine di autenticazione) |
| Database | MySQL (SQLite in memoria per i test) |
| Test | PHPUnit |

## Struttura principale

```
day2Week9/
├── app/Http/Controllers/UsersController.php   # logica CRUD
├── routes/web.php                             # rotte (area riservata sotto middleware auth)
├── resources/views/v1/                        # layout e view Blade del CRUD
├── database/migrations/                       # schema tabella users
└── tests/Feature/UsersCrudTest.php            # test del CRUD
```

## Avvio in locale

Requisiti: PHP 8.0, Composer, Node.js, MySQL.

```bash
cd day2Week9
composer install
npm install && npm run dev
cp .env.example .env          # imposta qui le credenziali del database
php artisan key:generate
php artisan migrate
php artisan serve
```

Apri http://localhost:8000, registra un account e accedi alla dashboard.

## Test

```bash
cd day2Week9
php artisan test
```

## Possibili sviluppi

- Ruoli e permessi (es. solo gli admin possono gestire gli utenti)
- Ricerca e filtri nella lista
- Upload dell'immagine profilo

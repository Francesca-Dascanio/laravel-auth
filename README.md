Utilizzo template:
creare il db
copiare il file .env.example e rinominarlo in .env
collegare il db nel file .env
eseguire composer install
eseguire il comando php artisan key:generate
eseguire npm i


Consegna:
creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.

Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina stilando tutto a vostro piacere utilizzando SASS.

Descrizione:
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze per l'autenticazione (utilizziamo il template con Bootstrap). OK


Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:
- Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office OK
- Creazione del modello Project con relativa migrazione, seeder, controller e rotte
- Per la parte di back-office creiamo un resource controller Admin\\ProjectController per gestire tutte le operazioni CRUD dei progetti

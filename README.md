# Game.Tv IT Partner Schedule
-   [Introduzione](#Introduzione)
-   [Cosa prevede il progetto](#Cosa-prevede-il-progetto)
-   [Progettazione concettuale e logica del database](#Progettazione-concettuale-e-logica-del-database])
-   [Soluzione proposta](#Soluzione-proposta)


1. ## Introduzione
   Il progetto nasce dalla necessità del reparto italiano di [Game.tv](https://www.game.tv/it) di trovare una soluzione alla compilazioni di alcune spred che l'aziende possiede.
   La realtà che si vuole automatizzare è la seguente:
      - Prenotazione di tornei settimanali da parte delle realtà che compongono la community italiana
      - Creazione di un calendar settimanale
      - Inserimento dei vincitori dei singoli eventi
      - Stilazione della classifica della competizione

   Ma analizziamo come si presenta attulamente il foglio:
   https://docs.google.com/spreadsheets/d/18JBTIHYY_pLny5lZpCQt3dTfmSac62ogMKXVkxiOGeY/edit?usp=sharing
   
   > - Il foglio si presenta molto pesante alla vista dell'utente.
   > - La creazione viene fatta manualmente ogni settimana dall'addetto.
   > - É facile che avvenga la compilazione in un campo non proprio del foglio e di conseguenza si sballa tutto lo schedule
   > - I reminder mandati alla realtà non sono automatizzati ma compiuti a mano sempre da un addetto
   > - Non vi è una privacy per i dati dei player che vincono un torneo di una qualsiasi realtà
   > - Qualsiasi utente autorizzato può modificare ogni cella a proprio piacimento anche se non di sua competenza
   > - La classifica viene calcolata manualmente sempre da un addetto
   
2. ## Cosa prevede il progetto
   Il progetto da me realizzato prevede:
     - Automazione della creazione dei fogli
     - Interfaccia admin
     - Interfaccia responsabile realtà
     - Interfaccia utente
     - Calcolo automatico della classifica
     - Newsletter per gli aggiornamenti
     - Registrazione/Login
     - Compilazione privata per ogni realtà

3. ## Progettazione concettuale e logica del database
   Questa è una prima bozza del database realizzato sottoforma di diagramma ER -> [Diagramma ER](https://imgur.com/a/hNlB8JC "Diagramma ER")

4. ## Soluzione proposta
   - Admin
      - Fornisce i permessi 
      - Approva/Nega le richieste di accesso per i nuovi utenti
      - Programma la creazione delle tabelle (Da verificare la possibilità di realizzazione)
    - Gestore realtà
      - Accede al sito
      - Inserisce i vincitori
      - Prenotare tornei
      - Visualizza la classifica parziale
    - Utente
      - Vedere il calendar settimanale
      - Vedere la classifica aggiornata in tempo reale
      - Supporto

Per la realizzazione sono progettate le seguenti pagine:
   - Realizzazione di pagine HTML
      - Pagina di Login/Registrazione
      - Pagina per l'inserimento dei dati dei vincitori
      - Pagina per la classifica 
      - Pagina Admin
      - Pagina per la visualizzazione della coda delle richieste d'accesso
      - Pagina per la realizzazione e la struttura delle tabelle
      - Pagina per la newsletter
   - Realizzazione di API rest in PHP
      - Pagina per l'autenticazione
      - Pagina per modifica e aggiornamento del databse
      - Pagina per la newsletter










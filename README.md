# Progetto Esame Radici
-   [Introduzione](#Introduzione)
-   [Cosa prevede il progetto](#Cosa-prevede-il-progetto)
-   [Progettazione concettuale e logica del database](#Progettazione-concettuale-e-logica-del-database])
-   [Soluzione proposta](#Soluzione-proposta)
-   [Analisi](#Analisi)


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
   > - Qualsiasi utente autorizzato può modificare ogni casella a proprio piacimento anche se non di sua competenza
   > - La claffica viene calcolata manualmente sempre da un addetto
   
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


4. ## Soluzione proposta


6. ## Analisi





Il mio progetto di fine anno sarà un'automatizzazione di una realtà attualmente usata su fogli di google.
Cosa permette di fare questo foglio?
   -  Il foglio permette l'inserimento di nominativi di player per la stilazione settimanale di una classifica:
   ![Foglio google](https://github.com/Radish0/Progetto_Esame/blob/main/Stuff/Esempio.png "Esempio di Foglio google")
   -  Calcolare la classifica settimanale
   -  Inserire nuovi fogli settimanalmente per ogni nuova competizione

2. ## Cosa prevede il progetto


3. ## Utenti    
     - Utilizzatore
     - Manutentore/Admin

4. ## Funzionalità
    - Admin
      - Fornisce i permessi 
      - Approva/Nega le richieste di accesso per i nuovi utenti
      - Programma la creazione delle tabelle (Da verificare la possibilità di realizzazione)
      - Calcola la classifica
    - Utente
      - Accede al sito
      - Inserisce i vincitori
      - Visualizza la classifica parziale
      
5. ## Implementazione
      - Realizzazione di pagine HTML
         - Form di Login/Registrazione
         - Form per l'inserimento dei dati dei vincitori
         - Form per la classifica 
         - Form Admin
         - Form per la visualizzazione della coda delle richieste d'accesso
         - Form per la realizzazione e la struttura delle tabelle
         - Form per la newsletter
      - Realizzazione di web services PHP
         - Api per l'autenticazione
         - Api per modifica e aggiornamento del databse
         - Api per la newsletter
      - Realizzazione di un database mySQL
         Entità progettate:
         - Admin (ID*, Email)
         - Utente(ID*, Mail, Realtà(FK))
         - Realta(ID*, Nome, Numero_tornei, Contatto)
         - Player(ID*, Nome in game, Nome in app)
         - Competizione(ID*)








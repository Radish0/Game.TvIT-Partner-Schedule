# Progetto Esame Radici
-   [Introduzione](#Introduzione)
-   [Cosa prevede il progetto](#Cosa-prevede-il-progetto)
-   [Utenti](#Utenti)
-   [Funzionalità](#Funzionalità)
-   [Implementazione](#Implementazione)


1. ## Introduzione

Il mio progetto di fine anno sarà un'automatizzazione di una realtà attualmente usata su fogli di google.
Cosa permette di fare questo foglio?
   -  Il foglio permette l'inserimento di nominativi di player per la stilazione settimanale di una classica:
   ![Foglio google](https://github.com/Radish0/Progetto_Esame/blob/main/Stuff/Esempio.png "Esempio di Foglio google")
   -  Calcolare la classifica settimanale
   -  Inserire nuovi fogli settimanalmente per ogni nuova competizione

2. ## Cosa prevede il progetto
     - Automazione della creazione dei fogli
     - Interfaccia admin
     - Interfaccia utente
     - Calcolo automatico della classifica
     - Newsletter per gli aggiornamenti
     - Registrazione/Login

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








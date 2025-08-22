# **Poročilo o projektu: GUI za dodajanje strank**
## 1. Osnovni podatki o projektu
•	**Naslov projekta:** Grafični uporabniški vmesnik za upravljanje strank (tudi Register in Login)
•	**Avtorja:** Maks in Samo
•	**Datum začetka:** 13.8.2025
•	**Tehnologije:** Vue.js, TypeScript, Axios, Laravel (Inertia.js), PHP
•	**Status:** zaključen (z možnostimi nadgradnje)
## 2. Namen in cilji
Cilj projekta je bil razviti intuitiven grafični uporabniški vmesnik (GUI), ki omogoča dodajanje, urejanje in brisanje strank v sistemu vsakemu uporabniku. Vmesnik je zasnovan za uporabo v poslovnem okolju, kjer je potrebno hitro in učinkovito upravljati podatke o strankah. Dodatno težavnost pa nama je delala razdelitev na **Frontend** in **Backend**.

## 3. Opis funkcionalnosti   
 **Registracija in Login**
•	S tem ločimo uporabnikove stranke in zagotovimo varnost
•	Več uporabnikov lahko uporablja to spletno stran
✅ **Dodajanje strank**
•	Obrazec za vnos imena, e-pošte, telefona in dejavnosti
•	Validacija vnosnih polj
•	Pošiljanje podatkov na strežnik preko axios.post
✏️ **Urejanje obstoječe stranke**
•	Predizpolnjen obrazec z obstoječimi podatki
•	Možnost spreminjanja in shranjevanja sprememb
•	Posodobitev podatkov preko axios.put
🗑️ **Brisanje stranke**
•	Potrditev brisanja preko confirm()
•	Odstranitev stranke iz baze preko axios.delete
•	Preusmeritev nazaj na seznam strank
 
## 4. Tehnična izvedba
•	**Frontend:** Vue.js, CSS, Laravel

•	**Komponente:** Ločena komponenta za gumb () in input ()

•	**Integracija:** Axios za komunikacijo z Laravel backendom

•	**Backend:**  Vue.js, PHP , Laravel

•	**Varnost:** Preverjanje ID-ja stranke pred pošiljanjem zahtevkov

## 5. Izzivi in rešitve
•	**Podvajanje okna:** Rešeno z zaklepom funkcije med potrditvijo

•	**Nepravilen tip podatkov v props:** Popravljeno z ustrezno definicijo  objekt

•	Občasno  **''crashanje računalnikov''**

## 6. Zaključek
**Projekt GUI za dodajanje strank** predstavlja uspešno sodelovanje med nama. Z uporabo sodobnih tehnologij sva razvila uporabniku prijazen vmesnik, ki omogoča učinkovito upravljanje podatkov o strankah. Projekt je dobra osnova za širitev funkcionalnosti in integracijo v večje sisteme.

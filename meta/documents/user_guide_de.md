
# User Guide für das Elastic Export Shopping24.de Plugin

<div class="container-toc"></div>

## 1 Bei Shopping24.de registrieren

shopping24.de ist eine Tochtergesellschaft der Otto Gruppe und ein Online-Portal für Preis- und Produktvergleiche. Weitere Informationen über shopping24.de finden Sie [hier](https://www.shopping24.de/Info/ueber-uns). 

## 2 Das Format Shopping24DE-Plugin in plentymarkets einrichten

Mit der Installation dieses Plugins erhalten Sie das Exportformat <b>Shopping24DE-Plugin</b>, mit dem Sie Daten über den elastischen Export zu Shpooing24.de übertragen. Um dieses Format für den elastischen Export nutzen zu können, installieren Sie zunächst das Plugin <b>Elastic Export</b> aus dem plentyMarketplace, wenn noch nicht geschehen. 

Sobald beide Plugins im Ihrem System installiert sind, kann das Exportformat <b>Shopping24DE-Plugin</b> erstellt werden. Mehr Informationen finden Sie auch auf der Handbuchseite [Daten exportieren](https://www.plentymarkets.eu/handbuch/datenaustausch/daten-exportieren/#4).

Neues Exportformat erstellen:
1. Öffnen Sie das Menü <b>Daten » Elastischer Export</b>.
2. Klicken Sie auf <b>Neuer Export</b>.
3. Nehmen Sie die Einstellungen vor. Beachten Sie dazu die Erläuterungen in Tabelle 1.
4. <b>Speichern</b> Sie die Einstellungen.
→ Eine ID für das Exportformat <b>Shopping24DE-Plugin</b> wird vergeben und das Exportformat erscheint in der Übersicht <b>Exporte</b>.


In der folgenden Tabelle finden Sie Hinweise zu den einzelnen Formateinstellungen und empfohlenen Artikelfiltern für das Format **Shopping24DE-Plugin**.

| **Einstellung**   |      **Erläuterung**| 
|----------|-------------|
| Name | Name eingeben. Unter diesem Namen erscheint das Exportformat in der Übersicht im Tab <b>Exporte</b>. |
| Typ |Typ <b>Artikel</b> aus dem Dropdown-Menü wählen. |
| Format | <b>Shopping24DE-Plugin</b> wählen. |
| Limit | Zahl eingeben. Wenn mehr als 9999 Datensätze an die Preissuchmaschine übertragen werden sollen, wird die Ausgabedatei wird für 24 Stunden nicht noch einmal neu generiert, um Ressourcen zu sparen. Wenn mehr mehr als 9999 Datensätze benötigt werden, muss die Option <b>Cache-Datei generieren</b> aktiv sein. |
| Cache-Datei generieren | Häkchen setzen, wenn mehr als 9999 Datensätze an die Preissuchmaschine übertragen werden sollen. Um eine optimale Performance des elastischen Exports zu gewährleisten, darf diese Option bei maximal 20 Exportformaten aktiv sein. |
| Bereitstellung | <b>URL</b> wählen. Mit dieser Option kann ein Token für die Authentifizierung generiert werden, damit ein externer Zugriff möglich ist. |
| Token, URL | Wenn unter <b<Bereitstellung</b< die Option <b>URL</b> gewählt wurde, auf <b>Token generieren</b> klicken. Der Token wird dann automatisch eingetragen. Die URL wird automatisch eingetragen, wenn unter <b>Token</b> der Token generiert wurde. |
| Dateiname | Der Dateiname muss auf <b>.csv</b> oder <b>.txt</b> enden, damit Shopping24.de die Datei erfolgreich importieren kann. |
| Artikelfilter hinzufügen | Artikelfilter aus dem Dropdown-Menü wählen und auf <b>Hinzufügen</b> klicken. Standardmäßig sind keine Filter voreingestellt. Es ist möglich, alle Artikelfilter aus dem Dropdown-Menü nacheinander hinzuzufügen. <b>Varianten</b> = <b>Alle übertragen</b> oder <b>Nur Hauptvarianten übertragen</b> wählen. <b>Märkte</b> = Einen, mehrere oder <b>ALLE</b> Märkte wählen. Die Verfügbarkeit muss für alle hier gewählten Märkte am Artikel hinterlegt sein. Andernfalls findet kein Export statt. <b>Währung</b> = Währung wählen. <b>Kategorie</b> = Aktivieren, damit der Artikel mit Kategorieverknüpfung übertragen wird. Es werden nur Artikel, die dieser Kategorie zugehören, übertragen. <b>Bild</b> = Aktivieren, damit der Artikel mit Bild übertragen wird. Es werden nur Artikel mit Bildern übertragen. <b>Mandant</b> = Mandant wählen. <b>Bestand</b> = Wählen, welche Bestände exportiert werden sollen. <b>Markierung 1 - 2</b> = Markierung wählen. <b>Hersteller</b> = Einen, mehrere oder <b>ALLE</b> Hersteller wählen. <b>Aktiv</b> = Nur aktive Varianten werden übertragen. |
| Produkt-URL | Wählen, ob die URL des Artikels oder der Variante an das Preisportal übertragen wird. Varianten URLs können nur in Kombination mit dem Ceres Webshop übertragen werden. |
| Mandant | Mandant wählen. Diese Einstellung wird für den URL-Aufbau verwendet. |
| URL-Parameter | Suffix für die Produkt-URL eingeben, wenn dies für den Export erforderlich ist. Die Produkt-URL wird dann um die eingegebene Zeichenkette erweitert, wenn weiter oben die Option <b>übertragen</b> für die Produkt-URL aktiviert wurde. |
| Auftragsherkunft | Die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll. |
| Marktplatzkonto | Marktplatzkonto aus dem Dropdown-Men wählen. Die Produkt-URL wird um die gewählte Auftragsherkunft erweitert, damit die Verkäufe später analysiert werden können. |
| Sprache | Sprache aus dem Dropdown-Menü wählen. |
| Artikelname | <b>Name 1</b>, <b>Name 2</b> oder <b>Name 3</b> wählen. Die Namen sind im Tab <b>Texte</b> eines Artikels gespeichert. Im Feld <b>Maximale Zeichenlänge (def. Text)</b> optional eine Zahl eingeben, wenn die Preissuchmaschine eine Begrenzung der Länge des Artikelnamen beim Export vorgibt. |
| Vorschautext | Diese Option ist für dieses Format nicht relevant. |
| Beschreibung | Wählen, welcher Text als Beschreibungstext übertragen werden soll.<br /> Im Feld <b>Maximale Zeichenlänge (def. Text)</b> optional eine Zahl eingeben, wenn die Preissuchmaschine eine Begrenzung der Länge der Beschreibung beim Export vorgibt.Option <b>HTML-Tags entfernen</b> aktivieren, damit die HTML-Tags beim Export entfernt werden. Im Feld <b>Erlaubte HTML-Tags, kommagetrennt (def. Text)</b> optional die HTML-Tags eingeben, die beim Export erlaubt sind. Wenn mehrere Tags eingegeben werden, mit Komma trennen. |
| Zielland | Zielland aus dem Dropdown-Menü wählen. |
|Barcode | ASIN, ISBN oder eine EAN aus dem Dropdown-Menü wählen. Der gewählte Barcode muss mit der oben gewählten Auftragsherkunft verknüpft sein. Andernfalls wird der Barcode nicht exportiert. |
| Bild | Position 0</b> oder <b>Erstes Bild</b> wählen, um dieses Bild zu exportieren. <b>Position 0</b> = Ein Bild mit der Position 0 wird übertragen. <br /><b>Erstes Bild</b> = Das erste Bild wird übertragen. Position des Energieetikettes eintragen. Alle Bilder die als Energieetikette übertragen werden sollen, müssen diese Position haben. |
| Angebotspreis | Diese Option ist für dieses Format nicht relevant. |
| UVP | Aktivieren, um den UVP zu übertragen. |
| Versandkosten | Aktivieren, damit die Versandkosten aus der Konfiguration übernommen werden. Wenn die Option aktiviert ist, stehen in den beiden Dropdown-Menüs Optionen für die Konfiguration und die Zahlungsart zur Verfügung. Option <b>Pauschale Versandkosten übertragen</b> aktivieren, damit die pauschalen Versandkosten übertragen werden. Wenn diese Option aktiviert ist, muss im Feld darunter ein Betrag eingegeben werden. |
| MwSt.-Hinweis | Diese Option ist für dieses Format nicht relevant. |
| Artikelverfügbarkeit | Option <b>überschreiben</b> aktivieren und in die Felder <b>1</b> bis <b>10</b>, die die ID der Verfügbarkeit darstellen, Artikelverfügbarkeiten< eintragen. Somit werden die Artikelverfügbarkeiten, die im Menü <b>System » Artikel » Verfügbarkeit</b> eingestellt wurden, überschrieben. |
       
_Tab. 1: Einstellungen für das Datenformat **Shopping24DE-Plugin**_       


## 3 Verfügbaren Spalten der Exportdatei

Öffnen Sie das Exportformat <b>Shopping24DE-Plugin</b> im Menü <b>Daten » Elastischer Export</b>, um die Exportdatei herunterzuladen und ggf. anzupassen. 

| **Spalte**   |      **Erläuterung**| 
|----------|-------------|
| art_name | Entsprechend der Formateinstellung <b>Artikelname</b>. |
| long_description | Entsprechend der Formateinstellung <b>Beschreibung</b>. |
| mage_url | URL des Bildes. Variantenbilder werden vor Artikelbildern priorisiert. |
| deep_link | Der <b>URL-Pfad</b> des Artikels abhängig vom gewählten <b>Mandanten</b> in den Formateinstellungen. |
| price | Der <b>Verkaufspreis</b>. |
| old_price | Der <b>Verkaufspreis</b> der Variante. Wenn der <b>UVP</b> in den Formateinstellungen aktiviert wurde und höher ist als der Verkaufspreis, wird dieser hier eingetragen. |
| currency | Der ISO3 <b>Währungscode</b> des Preises. |
| delivery_costs | Entsprechend der Formateinstellung <b>Versandkosten</b>. |
| category | Der Name der Kategorie. |
| brand | Der <b>Name des Herstellers</b> des Artikels. Der <b>Externe Name</b> unter <b>Einstellungen » Artikel » Hersteller</b> wird bevorzugt, wenn vorhanden. |
| gender_age | Die <b>Interessengruppe</b> des Artikels. |
| ean | Entsprechend der Formateinstellung <b>Barcode</b>. |
| keywords | Die <b>Keywords</b> des Artikels. |
| art_number | Die <b>Variantennummer</b> der Variante. |
| color | Der Wert eines Attributs, bei dem die Attributverknüpfung für <b>Amazon</b> mit <b>Color</b> gesetzt wurde. |
| clothing_size | Der Wert eines Attributs, bei dem die Attributverknüpfung für <b>Amazon</b> mit <b>Size</b> gesetzt wurde. |
| cut | Leer |
| link | Leer |
| unit_price | Die <b>Grundpreisinformation</b> im Format "Preis / Einheit". (Beispiel: 10,00 EUR / Kilogramm) |
		
_Tab. 2: Spalten der Exportdatei für **Shopping24.de**_

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-shopping-24-de/blob/master/LICENSE.md).

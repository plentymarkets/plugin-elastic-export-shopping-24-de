
# User Guide für das Elastic Export Shopping24.de Plugin

<div class="container-toc"></div>

## 1 Bei Shopping24.de registrieren

shopping24.de ist eine Tochtergesellschaft der Otto Gruppe und ein Online-Portal für Preis- und Produktvergleiche.

## 2 Das Format Shopping24DE-Plugin in plentymarkets einrichten

Um dieses Format nutzen zu können, benötigen Sie das Plugin Elastic Export.

Auf der Handbuchseite [Daten exportieren](https://www.plentymarkets.eu/handbuch/datenaustausch/daten-exportieren/#4) werden die einzelnen Formateinstellungen beschrieben.

In der folgenden Tabelle finden Sie Hinweise zu den Einstellungen, Formateinstellungen und empfohlenen Artikelfiltern für das Format **Shopping24DE-Plugin**.
<table>
    <tr>
        <th>
            Einstellung
        </th>
        <th>
            Erläuterung
        </th>
    </tr>
    <tr>
        <td class="th" colspan="2">
            Einstellungen
        </td>
    </tr>
    <tr>
        <td>
            Format
        </td>
        <td>
            <b>Shopping24DE-Plugin</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Bereitstellung
        </td>
        <td>
            <b>URL</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Dateiname
        </td>
        <td>
            Der Dateiname muss auf <b>.csv</b> oder <b>.txt</b> enden, damit Twenga.com die Datei erfolgreich importieren kann.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Artikelfilter
        </td>
    </tr>
    <tr>
        <td>
            Aktiv
        </td>
        <td>
            <b>Aktiv</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Märkte
        </td>
        <td>
            Eine oder mehrere Auftragsherkünfte wählen. Die gewählten Auftragsherkünfte müssen an der Variante aktiviert sein, damit der Artikel exportiert wird.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Formateinstellungen
        </td>
    </tr>
    <tr>
        <td>
            Auftragsherkunft
        </td>
        <td>
            Die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll.
        </td>        
    </tr>
    <tr>
        <td>
            Vorschautext
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
    <tr>
        <td>
            Angebotspreis
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
    <tr>
        <td>
            MwSt.-Hinweis
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
</table>


## 3 Übersicht der verfügbaren Spalten

<table>
    <tr>
        <th>
            Spaltenbezeichnung
        </th>
        <th>
            Erläuterung
        </th>
    </tr>
    <tr>
		<td>
			art_name
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Artikelname</b>.
		</td>        
	</tr>
	<tr>
		<td>
			long_description
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Beschreibung</b>.
		</td>        
	</tr>
	<tr>
		<td>
			image_url
		</td>
		<td>
			<b>Inhalt:</b> URL des Bildes. Variantenbiler werden vor Artikelbildern priorisiert.
		</td>        
	</tr>
    <tr>
		<td>
			deep_link
		</td>
		<td>
			<b>Inhalt:</b> Der <b>URL-Pfad</b> des Artikels abhängig vom gewählten <b>Mandanten</b> in den Formateinstellungen.
		</td>        
	</tr>
	<tr>
		<td>
			price
		</td>
		<td>
			<b>Inhalt:</b> Hier steht der <b>Verkaufspreis</b>.
		</td>        
	</tr>
	<tr>
		<td>
			old_price
		</td>
		<td>
			<b>Inhalt:</b> Der <b>Verkaufspreis</b> der Variante. Wenn der <b>UVP</b> in den Formateinstellungen aktiviert wurde und höher ist als der Verkaufspreis, wird dieser hier eingetragen.
		</td>        
	</tr>
	<tr>
		<td>
			currency
		</td>
		<td>
			<b>Inhalt:</b> Der ISO3 <b>Währungscode</b> der Preise.
		</td>        
	</tr>
	<tr>
		<td>
			delivery_costs
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Versandkosten</b>.
		</td>        
	</tr>
	<tr>
		<td>
			category
		</td>
		<td>
			<b>Inhalt:</b> Der Name der Kategorie.
		</td>        
	</tr>
	<tr>
		<td>
			brand
		</td>
		<td>
			<b>Inhalt:</b> Der <b>Name des Herstellers</b> des Artikels. Der <b>Externe Name</b> unter <b>Einstellungen » Artikel » Hersteller</b> wird bevorzugt, wenn vorhanden.
		</td>        
	</tr>
    <tr>
        <td>
            gender_age
        </td>
        <td>
            <b>Inhalt:</b> Die <b>Interessengruppe</b> des Artikels.
        </td>        
    </tr>
    <tr>
		<td>
			ean
		</td>
		<td>
			<b>Inhalt:</b> Entsprechend der Formateinstellung <b>Barcode</b>.
		</td>        
	</tr>
	<tr>
		<td>
			keywords
		</td>
		<td>
			<b>Inhalt:</b> Die <b>Keywords</b> des Artikels.
		</td>        
	</tr>
    <tr>
		<td>
			art_number
		</td>
		<td>
			<b>Inhalt:</b> Die <b>Variantennummer</b> der Variante.
		</td>        
	</tr>
	<tr>
		<td>
			color
		</td>
		<td>
			<b>Inhalt:</b> Der Wert eines Attributs, bei dem die Attributverknüpfung für <b>Amazon</b> mit <b>Color</b> gesetzt wurde.
		</td>        
	</tr>
	<tr>
		<td>
			clothing_size
		</td>
		<td>
			<b>Inhalt:</b> Der Wert eines Attributs, bei dem die Attributverknüpfung für <b>Amazon</b> mit <b>Size</b> gesetzt wurde.
		</td>        
	</tr>
	<tr>
		<td>
			cut
		</td>
		<td>
			<b>Inhalt:</b> Leer.
		</td>        
	</tr>
	<tr>
		<td>
			link
		</td>
		<td>
			<b>Inhalt:</b> Leer.
		</td>        
	</tr>
	<tr>
		<td>
			unit_price
		</td>
		<td>
			<b>Inhalt:</b> Die <b>Grundpreisinformation</b> im Format "Preis / Einheit". (Beispiel: 10,00 EUR / Kilogramm)
		</td>        
	</tr>
</table>

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-shopping-24-de/blob/master/LICENSE.md).

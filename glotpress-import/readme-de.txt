=== Plogins Marks - Product Badges for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product badges, sale badge, new badge, low stock
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Nur CSS-Produktabzeichen für WooCommerce: Ausverkauf, Neu, Niedriger Lagerbestand, Bestseller und ein manuelles Abzeichen. Kein JavaScript, keine Layoutverschiebung.

== Description ==

Marks bringt Abzeichen auf deine WooCommerce-Produkte. Einige erscheinen jeweils einzeln
Aktueller Status des Produkts (<strong>Ausverkauf</strong>, <strong>Neu</strong>, <strong>Wenig auf Lager</strong>, <strong>Bestseller</strong> und einige mehr
andere), und Du kannst auch ein manuelles Abzeichen pro Produkt festlegen, indem du ein geschäftsweites Etikett verwenden
und Farbe.

Die Abzeichen werden mit CSS gezeichnet und über dem Produktbild platziert, sodass sie „nein“ hinzufügen
JavaScript verwenden und das Layout nicht verschieben, wenn die Seite geladen wird. Sie sind auf der Single zu sehen
Produktseite und in Shop-, Kategorie- und Tag-Listings.

Der Code ist offen und befindet sich unter https://github.com/wppoland/plogins-marks, falls du ihn lesen möchten
es, melde einen Fehler oder sende einen Patch.

Die Konfiguration befindet sich unter einem <strong>Marks</strong>-Administratormenü der obersten Ebene: ein globales Ein-/Ausschalten
Umschalten, Platzierungssteuerelemente, Umschalten pro Regel mit benutzerdefinierten Beschriftungen, Schwellenwerte usw
Abschnitt „Darstellung“ (Form, Großschreibung, kontextabhängige Großbuchstaben) und das manuelle Abzeichen
Etikett und Farbe. Die Einstellungen werden beim Speichern bereinigt und festgehalten.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/marks/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/marks/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-marks
* <strong>Fehlerberichte und Funktionsanfragen</strong> – https://github.com/wppoland/plogins-marks/issues


= Features =

* Automatische Abzeichen: Ausverkauf, Neu, Geringer Lagerbestand, Bestseller, Rabattprozentsatz, Kostenloser Versand, Ausverkauft.
* Benutzerdefinierter Etikettentext für jedes automatische Abzeichen.
* Konfigurierbare Schwellenwerte: Neuheitenfenster, geringer Lagerbestand, Bestsellerverkäufe.
* Kostenlose Versanderkennung nach Produktversandklasse.
* Platzierungskontrollen: einzelne Produktseite und/oder Shop- und Kategorieeinträge.
* Steuerelemente für das Erscheinungsbild: Pillen- oder Quadratform, Großbuchstaben und eine kontextbezogene Abzeichenkappe.
* Shortcode „[marks_badges]“, um Abzeichen überall zu platzieren.
* Ein einzelnes manuelles Abzeichen (Etikett + Farbe), das pro Produkt über Meta angezeigt wird.
* Reines CSS-Rendering: kein JavaScript, keine Layoutverschiebung.
* Globales Ein-/Ausschalten und Umschalten pro Regel.
* Übersetzungsbereit (POT enthalten) und saubere Deinstallation.
* Kompatibel mit HPOS und Warenkorb-/Kassenblöcken.

= The [marks_badges] shortcode =

Verwende „[marks_badges]“, um die Abzeichen eines Produkts in eine beliebige Seite, einen Beitrag oder ein Widget einzufügen. Mit
Keine Attribute, es verwendet das aktuelle Produkt (innerhalb einer Schleife oder für ein einzelnes Produkt).
Seite). Übergebe „id“, um auf ein bestimmtes Produkt und „context“ („single“ oder „loop“) abzuzielen
Wähle den Renderstil:

`[marks_badges id="123" context="loop"]`

== Installation ==

1. Lade das Plugin nach „/wp-content/plugins/marks“ hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss aktiv sein.
3. Gehe zum Menü <strong>Markierungen</strong>, aktiviere Abzeichen und wähle aus, welche automatischen Abzeichen angezeigt werden sollen.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja.

= When does the "New" badge show? =

Für Produkte, die innerhalb des Neuheitsfensters erstellt wurden (standardmäßig 30 Tage).

= When does the "Low stock" badge show? =

Auf lagergeführte Produkte, deren Restmenge der konfigurierten Menge entspricht oder darunter liegt
Schwelle für niedrige Lagerbestände.

= How do I add a manual badge to a single product? =

Lege die Beschriftung und Farbe des manuellen Ausweises auf dem Bildschirm „Markierungseinstellungen“ fest und lege dann fest
Produkt-Meta „_marks_manual_text“ (und optional „_marks_manual_style“) auf der
Produkte, die es anzeigen sollen.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es im Netzwerk oder auf einzelnen Websites. Jede Site behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Automatische Abzeichen in einem Shop-Eintrag.
2. Der Bildschirm „Markierungseinstellungen“.

== External Services ==

Marks stellt keine Verbindung zu externen Diensten her. Abzeichen werden vollständig auf deinem eigenen Server aus WooCommerce-Daten berechnet und gezeichnet, die sich bereits in deiner Datenbank befinden (Preis, Lagerbestand, Verkäufe, Produktdaten und Versandklasse), und das Abzeichen-CSS wird aus den eigenen Assets des Plugins bereitgestellt.

Das Plugin speichert seine Konfiguration in zwei WordPress-Optionen („marks_settings“ und „marks_db_version“) und liest Post-Meta pro Produkt („_marks_manual_text“ und „_marks_manual_style“) für das manuelle Abzeichen. Es werden keine Besucher- oder Geschäftsdaten irgendwohin gesendet, und Marks ruft nicht zu Hause an, lädt keine Remote-Skripte oder Schriftarten und sendet keine E-Mails.

== Changelog ==

= 1.0.1 =
* Erste stabile Version.

= 0.3.1 =
* Für einen eindeutigeren Plugin-Namen in „Plogins Marks for WooCommerce“ umbenannt.

= 0.3.0 =
* Neu: Optionales Ausblenden des standardmäßigen WooCommerce-Verkaufs-Flashs, wenn das Marks-Verkaufsabzeichen aktiviert ist.
* Mithilfe der Admin-Einstellungen kannst du die Tooltips polieren.

= 0.2.0 =
* Füge Rabattprozentsätze, kostenlosen Versand und automatische Abzeichen „Ausverkauft“ hinzu.
* Füge für jedes automatische Abzeichen einen benutzerdefinierten Etikettentext hinzu.
* Füge konfigurierbare Schwellenwerte für Neuheiten und Bestseller sowie die Erkennung von kostenlosen Versandklassen hinzu.
* Platzierungskontrollen hinzufügen (einzelne Produktseite und/oder Auflistungen).
* Füge Steuerelemente für das Erscheinungsbild hinzu: Abzeichenform, Großbuchstaben und kontextbezogene Abzeichenkappen.
* Füge den Shortcode „[marks_badges]“ für die manuelle Platzierung hinzu.
* Füge eine Übersetzungsvorlage (sprachen/marks.pot) und eine Deinstallationsbereinigung hinzu.

= 0.1.0 =
* Erstveröffentlichung: automatische Abzeichen „Ausverkauf/Neu/Geringer Lagerbestand/Bestseller“, ein manuelles Abzeichen und ein Einstellungsbildschirm. Nur CSS.

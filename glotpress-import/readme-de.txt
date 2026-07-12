=== Plogins Marks - Sale & Stock Badges for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product badges, sale badge, new badge, low stock
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Produkt-Abzeichen für WooCommerce – komplett per CSS: Verkauf, Neu, Geringer Lagerbestand, Bestseller und ein manuelles Abzeichen. Kein JavaScript, keine Layout-Verschiebung.

== Description ==

Marks bringt Abzeichen auf deine WooCommerce-Produkte. Einige erscheinen von selbst
anhand des aktuellen Zustands eines Produkts (<strong>Verkauf</strong>, <strong>Neu</strong>, <strong>Geringer Lagerbestand</strong>, <strong>Bestseller</strong> und einige
weitere), und du kannst außerdem pro Produkt ein manuelles Abzeichen mit einem shopweiten Etikett
und einer Farbe festlegen.

Die Abzeichen werden per CSS gezeichnet und liegen über dem Produktbild, also fügen sie kein
JavaScript hinzu und verschieben das Layout beim Laden der Seite nicht. Sie erscheinen auf der
einzelnen Produktseite sowie in Shop-, Kategorie- und Schlagwort-Listen.

Der Code ist offen und liegt unter https://github.com/wppoland/plogins-marks, falls du ihn lesen,
einen Fehler melden oder einen Patch einsenden möchtest.

Die Konfiguration findest du in einem eigenen Hauptmenü <strong>Marks</strong>: ein globaler An-/Aus-Schalter,
Platzierungsoptionen, Schalter je Regel mit eigenen Beschriftungen, Schwellenwerte, ein
Bereich fürs Erscheinungsbild (Form, Großschreibung, Obergrenzen je Kontext) sowie Beschriftung und Farbe
des manuellen Abzeichens. Die Einstellungen werden beim Speichern bereinigt und begrenzt.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/marks/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/marks/
* <strong>Quellcode</strong> - https://github.com/wppoland/plogins-marks
* <strong>Fehlerberichte und Funktionswünsche</strong> - https://github.com/wppoland/plogins-marks/issues


= Features =

* Automatische Abzeichen: Verkauf, Neu, Geringer Lagerbestand, Bestseller, Rabattprozentsatz, Kostenloser Versand, Ausverkauft.
* Eigener Beschriftungstext für jedes automatische Abzeichen.
* Konfigurierbare Schwellenwerte: Neuheitenfenster, Grenze für geringen Lagerbestand, Bestseller-Verkäufe.
* Erkennung von kostenlosem Versand anhand der Versandklasse des Produkts.
* Platzierungsoptionen: einzelne Produktseite und/oder Shop- und Kategorie-Listen.
* Optionen fürs Erscheinungsbild: Pillen- oder Quadratform, Großschreibung und eine Obergrenze für Abzeichen je Kontext.
* Shortcode `[marks_badges]`, um Abzeichen überall zu platzieren.
* Ein einzelnes manuelles Abzeichen (Beschriftung + Farbe) je Produkt, angezeigt über Meta.
* Reines CSS-Rendering: kein JavaScript, keine Layout-Verschiebung.
* Globaler An-/Aus-Schalter und Schalter je Regel.
* Übersetzungsbereit (POT enthalten) und saubere Deinstallation.
* Kompatibel mit HPOS sowie Warenkorb-/Kassenblöcken.

= The [marks_badges] shortcode =

Verwende `[marks_badges]`, um die Abzeichen eines Produkts in eine beliebige Seite, einen Beitrag oder ein Widget einzufügen. Ohne
Attribute nutzt er das aktuelle Produkt (innerhalb einer Schleife oder auf einer einzelnen
Produktseite). Übergib `id`, um ein bestimmtes Produkt anzusprechen, und `context` (`single` oder `loop`), um
den Renderstil zu wählen:

`[marks_badges id="123" context="loop"]`

== Installation ==

1. Lade das Plugin nach `/wp-content/plugins/marks` hoch oder installiere es über Plugins → Installieren.
2. Aktiviere es. WooCommerce muss aktiv sein.
3. Gehe zum Menü <strong>Marks</strong>, aktiviere die Abzeichen und wähle, welche automatischen Abzeichen angezeigt werden.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja, WooCommerce ist erforderlich.

= When does the "New" badge show? =

Bei Produkten, die innerhalb des Neuheitenfensters angelegt wurden (standardmäßig 30 Tage).

= When does the "Low stock" badge show? =

Bei lagerverwalteten Produkten, deren Restmenge auf oder unter dem konfigurierten
Schwellenwert für geringen Lagerbestand liegt.

= How do I add a manual badge to a single product? =

Lege Beschriftung und Farbe des manuellen Abzeichens im Marks-Einstellungsbildschirm fest und setze dann
das Produkt-Meta `_marks_manual_text` (und optional `_marks_manual_style`) bei den
Produkten, die es anzeigen sollen.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es netzwerkweit oder auf einzelnen Websites; jede Website behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Automatische Abzeichen in einer Shop-Liste.
2. Der Marks-Einstellungsbildschirm.

== External Services ==

Marks stellt keine Verbindung zu externen Diensten her. Abzeichen werden vollständig auf deinem eigenen Server aus den bereits in deiner Datenbank vorhandenen WooCommerce-Daten berechnet und gezeichnet (Preis, Lagerbestand, Verkäufe, Produktdaten und Versandklasse), und das Abzeichen-CSS wird aus den eigenen Assets des Plugins ausgeliefert.

Das Plugin speichert seine Konfiguration in zwei WordPress-Optionen (`marks_settings` und `marks_db_version`) und liest je Produkt Beitrags-Meta (`_marks_manual_text` und `_marks_manual_style`) für das manuelle Abzeichen. Es werden keinerlei Besucher- oder Shop-Daten irgendwohin gesendet, und Marks funkt nicht nach Hause, lädt keine entfernten Skripte oder Schriftarten und versendet keine E-Mails.

== Translations ==

Plogins Marks enthält polnische, deutsche und spanische Übersetzungen für die Plugin-Oberfläche. Die Textdomain ist `plogins-marks`, sodass Sprachpakete von WordPress.org diese mitgelieferten Übersetzungen ebenfalls überschreiben oder erweitern können.

== Changelog ==

= 1.0.2 =
* Mitgelieferte polnische, deutsche und spanische Übersetzungen für die Plugin-Oberfläche hinzugefügt.

= 1.0.1 =
* Erste stabile Version.

= 0.3.1 =
* Umbenannt in Plogins Marks for WooCommerce für einen unverwechselbaren Plugin-Namen.

= 0.3.0 =
* Neu: optionales Ausblenden des standardmäßigen WooCommerce-Sale-Flashs, wenn das Verkauf-Abzeichen von Marks aktiv ist.
* Feinschliff an den Tooltips in den Admin-Einstellungen.

= 0.2.0 =
* Fügt die automatischen Abzeichen Rabattprozentsatz, Kostenloser Versand und Ausverkauft hinzu.
* Fügt für jedes automatische Abzeichen einen eigenen Beschriftungstext hinzu.
* Fügt konfigurierbare Schwellenwerte für Neuheitenfenster und Bestseller sowie die Erkennung der Klasse für kostenlosen Versand hinzu.
* Fügt Platzierungsoptionen hinzu (einzelne Produktseite und/oder Listen).
* Fügt Optionen fürs Erscheinungsbild hinzu: Abzeichenform, Großschreibung und Obergrenzen für Abzeichen je Kontext.
* Fügt den Shortcode `[marks_badges]` für die manuelle Platzierung hinzu.
* Fügt eine Übersetzungsvorlage (languages/marks.pot) und eine Deinstallations-Bereinigung hinzu.

= 0.1.0 =
* Erstveröffentlichung: automatische Abzeichen Verkauf / Neu / Geringer Lagerbestand / Bestseller, ein manuelles Abzeichen und ein Einstellungsbildschirm. Reines CSS.

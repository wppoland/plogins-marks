=== Plogins Marks - Sale & Stock Badges for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product badges, sale badge, new badge, low stock
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Oznaczenia produktów wyłącznie w CSS dla WooCommerce: Promocja, Nowość, Niski stan, Bestseller oraz oznaczenie ręczne. Bez JavaScriptu, bez przeskoków układu.

== Description ==

Marks umieszcza oznaczenia na Twoich produktach WooCommerce. Część pojawia się samoczynnie na
podstawie bieżącego stanu produktu (<strong>Promocja</strong>, <strong>Nowość</strong>, <strong>Niski stan</strong>, <strong>Bestseller</strong> i kilka
innych), a dodatkowo możesz ustawić jedno ręczne oznaczenie na produkt, używając etykiety i koloru
wspólnych dla całego sklepu.

Oznaczenia są rysowane w CSS i umieszczone nad obrazem produktu, więc nie dodają żadnego
JavaScriptu i nie przesuwają układu podczas ładowania strony. Pojawiają się na stronie
pojedynczego produktu oraz na listach sklepu, kategorii i tagów.

Kod jest otwarty i znajduje się na https://github.com/wppoland/plogins-marks — jeśli chcesz go przejrzeć,
zgłosić błąd lub przesłać poprawkę.

Konfiguracja znajduje się w głównym menu administracyjnym <strong>Marks</strong>: globalny przełącznik włącz/wyłącz,
ustawienia rozmieszczenia, przełączniki dla poszczególnych reguł z własnymi etykietami, progi,
sekcja wyglądu (kształt, wielkie litery, limity na kontekst) oraz etykieta i kolor
ręcznego oznaczenia. Ustawienia są przy zapisie oczyszczane i ograniczane do dozwolonych wartości.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/marks/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/marks/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-marks
* <strong>Zgłoszenia błędów i propozycje funkcji</strong> - https://github.com/wppoland/plogins-marks/issues


= Features =

* Automatyczne oznaczenia: Promocja, Nowość, Niski stan, Bestseller, Procent rabatu, Darmowa wysyłka, Niedostępny.
* Własny tekst etykiety dla każdego automatycznego oznaczenia.
* Konfigurowalne progi: okno nowości, poziom niskiego stanu, sprzedaż bestsellerów.
* Wykrywanie darmowej wysyłki na podstawie klasy wysyłkowej produktu.
* Kontrola rozmieszczenia: strona pojedynczego produktu i/lub listy sklepu i kategorii.
* Kontrola wyglądu: kształt pigułki lub kwadratu, wielkie litery i limit oznaczeń na kontekst.
* Shortcode `[marks_badges]` do umieszczania oznaczeń w dowolnym miejscu.
* Jedno ręczne oznaczenie (etykieta + kolor) na produkt, ustawiane przez metadane.
* Renderowanie wyłącznie w CSS: bez JavaScriptu, bez przeskoków układu.
* Globalny przełącznik włącz/wyłącz oraz przełączniki dla poszczególnych reguł.
* Gotowe do tłumaczenia (POT w zestawie) i czysta dezinstalacja.
* Zgodne z HPOS oraz blokami koszyka i kasy.

= The [marks_badges] shortcode =

Użyj `[marks_badges]`, aby umieścić oznaczenia produktu na dowolnej stronie, wpisie lub w widżecie. Bez
atrybutów używa bieżącego produktu (wewnątrz pętli lub na stronie pojedynczego
produktu). Podaj `id`, aby wskazać konkretny produkt, oraz `context` (`single` lub `loop`), aby
wybrać styl renderowania:

`[marks_badges id="123" context="loop"]`

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/marks` lub zainstaluj przez Wtyczki → Dodaj nową.
2. Włącz ją. WooCommerce musi być aktywne.
3. Przejdź do menu <strong>Marks</strong>, włącz oznaczenia i wybierz, które automatyczne oznaczenia mają być wyświetlane.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak.

= When does the "New" badge show? =

Dla produktów utworzonych w oknie nowości (domyślnie 30 dni).

= When does the "Low stock" badge show? =

Dla produktów z zarządzaniem stanem magazynowym, których pozostała ilość jest równa skonfigurowanemu
progowi niskiego stanu lub od niego niższa.

= How do I add a manual badge to a single product? =

Ustaw etykietę i kolor ręcznego oznaczenia na ekranie ustawień Marks, a następnie ustaw
metadane produktu `_marks_manual_text` (i opcjonalnie `_marks_manual_style`) na
produktach, które mają je wyświetlać.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest zgodna z WordPress Multisite. Włącz ją dla całej sieci lub w pojedynczych witrynach; każda witryna zachowuje własne ustawienia i dane.

== Screenshots ==

1. Automatyczne oznaczenia na liście sklepu.
2. Ekran ustawień Marks.

== External Services ==

Marks nie łączy się z żadnymi usługami zewnętrznymi. Oznaczenia są w całości obliczane i rysowane na Twoim własnym serwerze na podstawie danych WooCommerce znajdujących się już w Twojej bazie danych (cena, stan magazynowy, sprzedaż, daty produktów i klasa wysyłkowa), a CSS oznaczeń jest serwowany z własnych zasobów wtyczki.

Wtyczka przechowuje swoją konfigurację w dwóch opcjach WordPress (`marks_settings` i `marks_db_version`) i odczytuje metadane wpisów dla poszczególnych produktów (`_marks_manual_text` i `_marks_manual_style`) na potrzeby ręcznego oznaczenia. Żadne dane odwiedzających ani sklepu nie są nigdzie wysyłane, a Marks nie łączy się z serwerem zewnętrznym, nie ładuje zdalnych skryptów ani czcionek i nie wysyła e-maili.

== Translations ==

Plogins Marks zawiera polskie, niemieckie i hiszpańskie tłumaczenie interfejsu wtyczki. Domena tekstowa to `plogins-marks`, dzięki czemu paczki językowe z WordPress.org mogą również nadpisywać lub rozszerzać dołączone tłumaczenia.

== Changelog ==

= 1.0.2 =
* Dodano dołączone polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki.

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.3.1 =
* Zmieniono nazwę na Plogins Marks for WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.3.0 =
* Nowość: opcjonalne ukrycie domyślnego dymka wyprzedaży WooCommerce, gdy włączone jest oznaczenie Promocja w Marks.
* Dopracowano podpowiedzi w ustawieniach administratora.

= 0.2.0 =
* Dodano oznaczenia automatyczne: Procent rabatu, Darmowa wysyłka i Niedostępny.
* Dodano własny tekst etykiety dla każdego automatycznego oznaczenia.
* Dodano konfigurowalne progi okna nowości i bestsellera oraz wykrywanie klasy darmowej wysyłki.
* Dodano kontrolę rozmieszczenia (strona pojedynczego produktu i/lub listy).
* Dodano kontrolę wyglądu: kształt oznaczenia, wielkie litery i limity oznaczeń na kontekst.
* Dodano shortcode `[marks_badges]` do ręcznego umieszczania.
* Dodano szablon tłumaczenia (languages/marks.pot) i czyszczenie przy dezinstalacji.

= 0.1.0 =
* Pierwsze wydanie: automatyczne oznaczenia Promocja / Nowość / Niski stan / Bestseller, oznaczenie ręczne i ekran ustawień. Wyłącznie w CSS.

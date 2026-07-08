=== Plogins Marks - Product Badges for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product badges, sale badge, new badge, low stock
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Odznaki produktów tylko CSS dla WooCommerce: Wyprzedaż, Nowość, Niski stan magazynowy, Bestseller i odznaka ręczna. Bez JavaScriptu, bez zmiany układu.

== Description ==

Marks umieszcza plakietki na Twoich produktach WooCommerce. Niektóre pojawiają się oddzielnie od każdego z nich
aktualny stan produktu (<strong>Wyprzedaż</strong>, <strong>Nowość</strong>, <strong>Mały zapas</strong>, <strong>Bestseller</strong> i kilka
inne), a także możesz ustawić jedną ręczną plakietkę dla każdego produktu, korzystając z etykiety obejmującej cały sklep
i kolor.

Odznaki są rysowane za pomocą CSS i umieszczone nad obrazem produktu, więc dodają nr
JavaScript i nie zmieniaj układu podczas ładowania strony. Pojawiają się na singlu
na stronie produktu oraz w sklepie, na listach kategorii i tagów.

Kod jest otwarty i znajduje się pod adresem https://github.com/wppoland/plogins-marks, jeśli chcesz przeczytać
go, zgłoś błąd lub wyślij łatkę.

Konfiguracja znajduje się w menu administratora <strong>Znaki</strong> najwyższego poziomu: globalne włączanie/wyłączanie
przełącznik, kontrola rozmieszczenia, przełączniki dla reguł z niestandardowymi etykietami, progi, an
sekcja dotycząca wyglądu (kształt, wielkie litery, czapki zależne od kontekstu) i plakietka instrukcji
etykieta i kolor. Ustawienia są oczyszczane i mocowane po zapisaniu.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/marks/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/marks/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-marks
* <strong>Raporty o błędach i prośby o nowe funkcje</strong> - https://github.com/wppoland/plogins-marks/issues


= Features =

* Automatyczne plakietki: Wyprzedaż, Nowość, Niski stan magazynowy, Bestseller, Procent rabatu, Darmowa wysyłka, Brak w magazynie.
* Niestandardowy tekst etykiety dla każdej automatycznej plakietki.
* Konfigurowalne progi: okno nowości, niski stan magazynowy, sprzedaż bestsellerów.
* Wykrywanie bezpłatnej wysyłki według klasy wysyłki produktu.
* Kontrola rozmieszczenia: pojedyncza strona produktu i/lub wykaz sklepów i kategorii.
* Kontrola wyglądu: kształt pigułki lub kwadratu, wielkie litery i czapka z plakietką dostosowaną do kontekstu.
* Krótki kod `[marks_badges]` umożliwiający umieszczanie odznak w dowolnym miejscu.
* Pojedyncza plakietka ręczna (etykieta + kolor) pokazywana dla każdego produktu za pośrednictwem meta.
* Renderowanie wyłącznie w CSS: bez JavaScript, bez zmiany układu.
* Globalny włącznik/wyłącznik i przełączniki dla poszczególnych reguł.
* Gotowe do tłumaczenia (w tym POT) i czystej dezinstalacji.
* Kompatybilny z HPOS i blokami koszyka/kasy.

= The [marks_badges] shortcode =

Użyj `[marks_badges]`, aby upuścić plakietki produktu na dowolnej stronie, poście lub widżecie. Z
żadnych atrybutów, używa bieżącego produktu (w pętli lub na pojedynczym produkcie).
strona). Przekaż „id”, aby kierować reklamy na konkretny produkt, i „kontekst” („pojedynczy” lub „pętla”), aby
wybierz styl renderowania:

`[marks_badges id="123" context="loop"]`

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/marks` lub zainstaluj poprzez Wtyczki → Dodaj nową.
2. Aktywuj. WooCommerce musi być aktywny.
3. Przejdź do menu <strong>Znaki</strong>, włącz odznaki i wybierz, które odznaki mają być wyświetlane automatycznie.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak.

= When does the "New" badge show? =

Na produkty utworzone w oknie nowości (domyślnie 30 dni).

= When does the "Low stock" badge show? =

W przypadku produktów zarządzanych w magazynie, których pozostała ilość jest równa lub niższa od skonfigurowanej
niski próg zapasów.

= How do I add a manual badge to a single product? =

Ustaw ręczną etykietę i kolor plakietki na ekranie ustawień Znaków, a następnie ustaw
meta produktu `_marks_manual_text` (i opcjonalnie `_marks_manual_style`) na stronie
produkty, które powinny go wyświetlać.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest kompatybilna z WordPress Multisite. Aktywuj go w sieci lub aktywuj na poszczególnych stronach; każda witryna przechowuje własne ustawienia i dane.

== Screenshots ==

1. Automatyczne plakietki na stronie sklepu.
2. Ekran ustawień Znaków.

== External Services ==

Marks nie łączy się z żadnymi usługami zewnętrznymi. Odznaki są obliczane i rysowane w całości na Twoim własnym serwerze na podstawie danych WooCommerce znajdujących się już w Twojej bazie danych (cena, stan magazynowy, sprzedaż, daty produktów i klasa wysyłki), a CSS identyfikatora jest udostępniany z własnych zasobów wtyczki.

Wtyczka przechowuje swoją konfigurację w dwóch opcjach WordPress („marks_settings” i „marks_db_version”) i odczytuje meta posty dotyczące poszczególnych produktów („_marks_manual_text” i „_marks_manual_style”) dla plakietki ręcznej. Żadne dane dotyczące odwiedzających ani sklepów nie są nigdzie wysyłane, a Marks nie dzwoni do domu, nie ładuje zdalnych skryptów ani czcionek ani nie wysyła e-maili.

== Changelog ==

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.3.1 =
* Zmieniono nazwę na Plogins Marks dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.3.0 =
* Nowość: opcjonalne ukrycie domyślnego flasha sprzedaży WooCommerce, gdy włączona jest odznaka sprzedaży Marks.
* Ustawienia administratora pomagają dopracować podpowiedzi.

= 0.2.0 =
* Dodaj procent rabatu, bezpłatną wysyłkę i automatyczne plakietki niedostępne.
* Dodaj niestandardowy tekst etykiety dla każdej automatycznej plakietki.
* Dodaj konfigurowalne progi okien nowości i bestsellerów, a także wykrywanie klasy bezpłatnej wysyłki.
* Dodaj kontrolę rozmieszczenia (pojedyncza strona produktu i/lub listy).
* Dodaj kontrolę wyglądu: kształt plakietki, wielkie litery i czapki plakietek według kontekstu.
* Dodaj krótki kod `[marks_badges]` do ręcznego umieszczania.
* Dodaj szablon tłumaczenia (języki/marks.pot) i oczyść dezinstalację.

= 0.1.0 =
* Pierwsza wersja: automatyczna plakietka Wyprzedaż / Nowość / Niski poziom zapasów / Bestseller, plakietka ręczna i ekran ustawień. Tylko CSS.

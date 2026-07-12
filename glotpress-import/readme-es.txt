=== Plogins Marks - Sale & Stock Badges for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product badges, sale badge, new badge, low stock
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Insignias de productos solo con CSS para WooCommerce: Venta, Nuevo, Stock bajo, Mejor vendido y una insignia manual. Sin JavaScript, sin saltos de diseño.

== Description ==

Marks coloca insignias en tus productos de WooCommerce. Algunas aparecen solas según el
estado actual de cada producto (<strong>Venta</strong>, <strong>Nuevo</strong>, <strong>Stock bajo</strong>, <strong>Mejor vendido</strong> y algunas
más) y, además, puedes definir una insignia manual por producto con una etiqueta y un color
para toda la tienda.

Las insignias se dibujan con CSS y se sitúan sobre la imagen del producto, así que no añaden
JavaScript ni desplazan el diseño al cargar la página. Se muestran en la página de
producto individual y en los listados de tienda, categoría y etiqueta.

El código es abierto y está en https://github.com/wppoland/plogins-marks por si quieres leerlo,
informar de un error o enviar un parche.

La configuración está en un menú de administración <strong>Marks</strong> de nivel superior: un interruptor global de encendido/apagado,
controles de ubicación, interruptores por regla con etiquetas personalizadas, umbrales, una
sección de apariencia (forma, mayúsculas, límites por contexto) y la etiqueta y el color
de la insignia manual. Los ajustes se depuran y se limitan al guardar.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/marks/docs/
* <strong>Página del plugin</strong> - https://plogins.com/es/marks/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-marks
* <strong>Informes de errores y peticiones de funciones</strong> - https://github.com/wppoland/plogins-marks/issues


= Features =

* Insignias automáticas: Venta, Nuevo, Stock bajo, Mejor vendido, Porcentaje de descuento, Envío gratis, Agotado.
* Texto de etiqueta personalizado para cada insignia automática.
* Umbrales configurables: ventana de novedad, nivel de stock bajo, ventas de best-seller.
* Detección de envío gratis según la clase de envío del producto.
* Controles de ubicación: página de producto individual o listados de tienda y categoría.
* Controles de apariencia: forma de pastilla o cuadrada, mayúsculas y un límite de insignias por contexto.
* Shortcode `[marks_badges]` para colocar insignias en cualquier lugar.
* Una sola insignia manual (etiqueta + color) por producto, mostrada mediante meta.
* Renderizado solo con CSS: sin JavaScript, sin saltos de diseño.
* Interruptor global de encendido/apagado e interruptores por regla.
* Listo para traducir (POT incluido) y desinstalación limpia.
* Compatible con HPOS y con los bloques de carrito y pago.

= The [marks_badges] shortcode =

Usa `[marks_badges]` para colocar las insignias de un producto en cualquier página, entrada o widget. Sin
atributos, usa el producto actual (dentro de un bucle o en una página de producto
individual). Pasa `id` para apuntar a un producto concreto y `context` (`single` o `loop`) para
elegir el estilo de renderizado:

`[marks_badges id="123" context="loop"]`

== Installation ==

1. Sube el plugin a `/wp-content/plugins/marks` o instálalo desde Plugins → Añadir nuevo.
2. Actívalo. WooCommerce debe estar activo.
3. Ve al menú <strong>Marks</strong>, activa las insignias y elige qué insignias automáticas mostrar.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí, se necesita WooCommerce.

= When does the "New" badge show? =

En los productos creados dentro de la ventana de novedad (30 días de forma predeterminada).

= When does the "Low stock" badge show? =

En productos con stock gestionado cuya cantidad restante sea igual o inferior al
umbral de stock bajo configurado.

= How do I add a manual badge to a single product? =

Define la etiqueta y el color de la insignia manual en la pantalla de ajustes de Marks y luego asigna el
meta de producto `_marks_manual_text` (y, opcionalmente, `_marks_manual_style`) en los
productos que deban mostrarla.


= Does this plugin work on WordPress Multisite? =

Sí. Este plugin es compatible con WordPress Multisite. Actívalo para toda la red o en sitios concretos; cada sitio conserva sus propios ajustes y datos.

== Screenshots ==

1. Insignias automáticas en un listado de tienda.
2. La pantalla de ajustes de Marks.

== External Services ==

Marks no se conecta a ningún servicio externo. Las insignias se calculan y se dibujan íntegramente en tu propio servidor a partir de los datos de WooCommerce que ya están en tu base de datos (precio, stock, ventas, fechas de producto y clase de envío), y el CSS de las insignias se sirve desde los propios recursos del plugin.

El plugin guarda su configuración en dos opciones de WordPress (`marks_settings` y `marks_db_version`) y lee el meta de entrada por producto (`_marks_manual_text` y `_marks_manual_style`) para la insignia manual. No se envía a ninguna parte ningún dato de visitantes ni de la tienda, y Marks no se comunica con servidores externos, no carga scripts ni fuentes remotos y no envía correos.

== Translations ==

Plogins Marks incluye traducciones al polaco, al alemán y al español para la interfaz del plugin. El dominio de texto es `plogins-marks`, por lo que los paquetes de idioma de WordPress.org también pueden sustituir o ampliar estas traducciones incluidas.

== Changelog ==

= 1.0.2 =
* Se añadieron traducciones incluidas al polaco, al alemán y al español para la interfaz del plugin.

= 1.0.1 =
* Primera versión estable.

= 0.3.1 =
* Renombrado a Plogins Marks for WooCommerce para un nombre de plugin más distintivo.

= 0.3.0 =
* Nuevo: ocultación opcional del flash de oferta predeterminado de WooCommerce cuando la insignia Venta de Marks está activa.
* Retoques en los tooltips de los ajustes de administración.

= 0.2.0 =
* Añade las insignias automáticas Porcentaje de descuento, Envío gratis y Agotado.
* Añade texto de etiqueta personalizado para cada insignia automática.
* Añade umbrales configurables de ventana de novedad y best-seller, además de la detección de la clase de envío gratis.
* Añade controles de ubicación (página de producto individual o listados).
* Añade controles de apariencia: forma de la insignia, mayúsculas y límites de insignias por contexto.
* Añade el shortcode `[marks_badges]` para la colocación manual.
* Añade una plantilla de traducción (languages/marks.pot) y una limpieza al desinstalar.

= 0.1.0 =
* Lanzamiento inicial: insignias automáticas Venta / Nuevo / Stock bajo / Mejor vendido, una insignia manual y una pantalla de ajustes. Solo con CSS.

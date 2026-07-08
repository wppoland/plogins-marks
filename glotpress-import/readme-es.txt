=== Plogins Marks - Product Badges for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product badges, sale badge, new badge, low stock
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Insignias de productos solo CSS para WooCommerce: Oferta, Nuevo, Stock bajo, Bestseller y una insignia manual. Sin JavaScript, sin cambios de diseño.

== Description ==

Marks coloca insignias en sus productos WooCommerce. Algunos aparecen solos de cada uno.
estado actual del producto (<strong>Oferta</strong>, <strong>Nuevo</strong>, <strong>Pocas existencias</strong>, <strong>Bestseller</strong> y algunos
otros), y también puede configurar una insignia manual por producto usando una etiqueta para toda la tienda
y color.

Las insignias se dibujan con CSS y se ubican sobre la imagen del producto, por lo que no agregan
JavaScript y no cambie el diseño cuando se carga la página. Se muestran en el single.
página del producto y en listados de tiendas, categorías y etiquetas.

El código está abierto y se encuentra en https://github.com/wppoland/plogins-marks si desea leerlo.
corregirlo, reportar un error o enviar un parche.

La configuración se encuentra en un menú de administración de <strong>Marcas</strong> de nivel superior: un encendido/apagado global
alternancia, controles de ubicación, alternancia por regla con etiquetas personalizadas, umbrales, un
sección de apariencia (forma, mayúsculas, mayúsculas por contexto) y la insignia del manual
etiqueta y color. Las configuraciones se desinfectan y se fijan al guardar.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/marks/docs/
* <strong>Página de complementos</strong> - https://plogins.com/es/marks/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-marks
* <strong>Informes de errores y solicitudes de funciones</strong> - https://github.com/wppoland/plogins-marks/issues


= Features =

* Insignias automáticas: Oferta, Nuevo, Stock bajo, Bestseller, Porcentaje de descuento, Envío gratis, Agotado.
* Texto de etiqueta personalizado para cada credencial automática.
* Umbrales configurables: ventana de novedad, nivel de stock bajo, ventas de los más vendidos.
* Detección de envío gratuito por clase de envío del producto.
* Controles de ubicación: página de un solo producto y/o listados de tiendas y categorías.
* Controles de apariencia: forma de pastilla o cuadrada, mayúsculas y una tapa de insignia por contexto.
* Código corto `[marks_badges]` para colocar insignias en cualquier lugar.
* Una única insignia manual (etiqueta + color) que se muestra por producto a través de meta.
* Representación solo CSS: sin JavaScript, sin cambio de diseño.
* Activación/desactivación global y alternancia por regla.
* Traducción lista (POT incluida) y desinstalación limpia.
* Compatible con HPOS y bloques de carrito/pago.

= The [marks_badges] shortcode =

Utilice `[marks_badges]` para colocar las insignias de un producto en cualquier página, publicación o widget. con
sin atributos, utiliza el producto actual (dentro de un bucle o en un solo producto)
página). Pase `id` para apuntar a un producto específico y `context` (`single` o `loop`) para
elige el estilo de renderizado:

`[marks_badges id="123" context="loop"]`

== Installation ==

1. Cargue el complemento en `/wp-content/plugins/marks`, o instálelo a través de Complementos → Añadir nuevo.
2. Actívalo. WooCommerce debe estar activo.
3. Vaya al menú <strong>Marcas</strong>, activa las insignias y elija qué insignias automáticas mostrar.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí.

= When does the "New" badge show? =

En productos creados dentro de la ventana de novedad (30 días de forma predeterminada).

= When does the "Low stock" badge show? =

En productos gestionados en stock cuya cantidad restante sea igual o inferior a la configurada
umbral de existencias bajas.

= How do I add a manual badge to a single product? =

Configure la etiqueta y el color de la insignia manual en la pantalla de configuración de Marcas, luego configure el
meta del producto `_marks_manual_text` (y opcionalmente `_marks_manual_style`) en el
productos que deben exhibirlo.


= Does this plugin work on WordPress Multisite? =

Sí. Este complemento es compatible con WordPress Multisite. Activarlo en red o activarlo en sitios individuales; Cada sitio mantiene su propia configuración y datos.

== Screenshots ==

1. Insignias automáticas en la ficha de una tienda.
2. La pantalla de configuración de Marcas.

== External Services ==

Marks no se conecta a ningún servicio externo. Las insignias se calculan y extraen completamente en su propio servidor a partir de los datos de WooCommerce que ya están en tu base de datos (precio, existencias, ventas, fechas de producto y clase de envío), y el CSS de la insignia se proporciona desde los propios activos del complemento.

El complemento almacena tu configuración en dos opciones de WordPress (`marks_settings` y `marks_db_version`) y lee metadatos de publicaciones por producto (`_marks_manual_text` y `_marks_manual_style`) para la insignia manual. No se envían datos de visitantes ni de tiendas a ninguna parte, y Marks no llama a casa, no carga scripts o fuentes remotas ni envía correos electrónicos.

== Changelog ==

= 1.0.1 =
* Primera versión estable.

= 0.3.1 =
* Se cambió el nombre a Plogins Marks para WooCommerce para obtener un nombre de complemento más distintivo.

= 0.3.0 =
* Nuevo: ocultación opcional del flash de venta predeterminado de WooCommerce cuando la insignia de venta de Marcas está habilitada.
* La configuración de administrador ayuda a pulir la información sobre herramientas.

= 0.2.0 =
* Añade porcentaje de descuento, envío gratuito e insignias automáticas de Agotado.
* Añade texto de etiqueta personalizado para cada insignia automática.
* Añade umbrales configurables de ventana de novedad y de best-seller, además de detección de clase de envío gratuito.
* Añadir controles de ubicación (página de producto único y/o listados).
* Añadir controles de apariencia: forma de la insignia, mayúsculas y tapas de insignia por contexto.
* Añade el código corto `[marks_badges]` para la colocación manual.
* Añade una plantilla de traducción (languages/marks.pot) y una limpieza de desinstalación.

= 0.1.0 =
* Lanzamiento inicial: insignias automáticas de Venta / Nuevo / Stock bajo / Bestseller, una insignia manual y una pantalla de configuración. Solo CSS.

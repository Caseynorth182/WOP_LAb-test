<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wop' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'wop' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'wop' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'FD7GjCdPaPkur;3 Dsp2#=[ZvH8Yw6^jZ<LrrS9_802*.}F>?Qxr`w*Sqr]w/&9V' );
define( 'SECURE_AUTH_KEY',  ',A@Ot}jt&|U@@Jb)on&{5&~`VCKOH9p~l*I1Ez!5q/F6c|I/!N`fIZX]T`kHkY* ' );
define( 'LOGGED_IN_KEY',    'Im^<)(kE^(sa^>5FKULHWt}PyQjeq2K_Uiz}SN,(dt}<EMj1qqAhV{qm_`>=LMk_' );
define( 'NONCE_KEY',        '9tdYCvh#p8OAKNw=XC+r7%,VtiLT4y#-RFG;/k|q;)4x?$Ut8C{_4-e<k/b1E+Z8' );
define( 'AUTH_SALT',        'T56uDE- H*S^!?1)Tla3D3v.T7MuiLal8$ $Da3>;/,YA=upAI?}}!`hI3(c[wma' );
define( 'SECURE_AUTH_SALT', '>QHflH:2Xa*~?TB0dv{y6(%;BP^27SU3,}z%3Pwre=/KIQD<|5tI3|]Am4r:}]#D' );
define( 'LOGGED_IN_SALT',   'Yf+ItX{,-{SujE-pGa*sj9kH]gQZaq|gjO(UX$OtcYEe8bSZzg.%I`b,-19B5<<E' );
define( 'NONCE_SALT',       'j9)pY6VmxTs2n)R!v62pS&rL+:$Zp.GWGcgRO@/0RV1j,82nvD8.NXeV(2Ba!;4*' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

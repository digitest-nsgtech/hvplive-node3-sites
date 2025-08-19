<?php




if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])
  && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'
) {
  $_SERVER['HTTPS'] = 'on';
}

// And enable Drupal’s built-in reverse-proxy trust:
$settings['reverse_proxy'] = TRUE;
// List the CIDR(s) or IP(s) of your ingress/load-balancer.
$settings['reverse_proxy_addresses'] = [
  '10.42.0.0/16',  // all Pod IPs (including your Ingress)
  '127.0.0.1',     // local‐CLI testing if you ever curl from inside the box
];
// Trust all the X-Forwarded-* headers:
$settings['reverse_proxy_trusted_headers'] = 31;



$settings['config_sync_directory'] = $app_root . '/config/sync';



// —————————————————————————————————————————————
// Trusted host patterns must come first in settings.php
// —————————————————————————————————————————————
$settings['trusted_host_patterns'] = [
  // Both with- and without- “www”
  '^www\.laekverekool\.edu\.ee$',
  '^laekverekool\.edu\.ee$',
];

$base_url = 'https://laekverekool.edu.ee';

$settings['hash_salt']  = file_get_contents(__DIR__ . '/salt.txt');

$settings['update_free_access'] = FALSE;
$settings['file_public_path'] = 'sites/laekverekool.edu.ee/files';
$settings['file_private_path'] = 'sites/laekverekool.edu.ee/privatefiles';
$settings['file_temp_path'] = 'sites/laekverekool.edu.ee/tmp';

/**
 * OVERRIDES
 */
$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];
$settings['entity_update_batch_size'] = 50;
$settings['entity_update_backup'] = TRUE;
$settings['state_cache'] = TRUE;
$settings['migrate_node_migrate_type_classic'] = FALSE;


$databases['default']['default'] = array (
  'database' => 'laekverekool_edu_ee_db',
  'username' => 'laekverekool_edu_ee_user',
  'password' => 'UW0ZTxpgFgYWsnlxixFkTLpxg7OW+HYT',
  'prefix' => '',
  'host' => '10.0.4.8',
  'port' => '3306',
  'isolation_level' => 'READ COMMITTED',
  'driver' => 'mysql',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
);




<?php

#$settings['config_sync_directory'] = '/opt/d10deploy/config/sync';
$settings['config_sync_directory'] = $app_root . '/config/sync';


// —————————————————————————————————————————————
// Trusted host patterns must come first in settings.php
// —————————————————————————————————————————————
$settings['trusted_host_patterns'] = [
  // Both with- and without- “www”
  '^www\.vaatamiseks\.veebiplatvorm\.ee$',
  '^vaatamiseks\.veebiplatvorm\.ee$',
];

$base_url = 'https://vaatamiseks.veebiplatvorm.ee';

$settings['hash_salt']  = file_get_contents(__DIR__ . '/salt.txt');

$settings['update_free_access'] = FALSE;
$settings['file_public_path'] = 'sites/vaatamiseks.veebiplatvorm.ee/files/myfiles';
$settings['file_private_path'] = 'sites/vaatamiseks.veebiplatvorm.ee/privatefiles';
$settings['file_temp_path'] = 'sites/vaatamiseks.veebiplatvorm.ee/tmp';

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
  'database' => 'vaatamiseks_veebiplatvorm_ee_db',
  'username' => 'vaatamiseks_veebiplatvorm_user',
  'password' => 'vaatamiseks_pass',
  'prefix' => '',
  'host' => '10.0.4.5',
  'port' => '3306',
  'isolation_level' => 'READ COMMITTED',
  'driver' => 'mysql',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
);




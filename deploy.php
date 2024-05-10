<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:wahabtaofeeqo/twc-manooka.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Host
host('146.190.169.252')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/manooka');
// host('')
//     ->set('remote_user', 'deployer')
//     ->set('deploy_path', '~/');

// Hooks
after('deploy:failed', 'deploy:unlock');

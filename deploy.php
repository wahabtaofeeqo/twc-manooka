<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
set('application', 'Manooka');

set('repository', 'git@github.com:wahabtaofeeqo/twc-manooka.git');

set('git_tty', false);
set('ssh_multiplexing', false);
//set('writable_mode', 'acl');
set('writable_use_sudo', true);
set('writable_mode', 'chmod');
set('composer_options', ' --ignore-platform-reqs');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Host
host('209.38.146.53')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/manooka');
// host('')
//     ->set('remote_user', 'deployer')
//     ->set('deploy_path', '~/');

// Hooks
after('deploy:failed', 'deploy:unlock');

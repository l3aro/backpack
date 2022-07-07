@servers(['web' => 'root@dev.rezonia.net -p 2254'])

@setup
    $repository = 'git@github.com-baro:l3aro/backpack.git';
    $app_dir = '/www/wwwroot/baro.rezonia.com';
@endsetup

@story('deploy')
    clone_repository
    run_composer
    run_deploy_scripts
@endstory

@task('clone_repository')
    echo '* Cloning repository'
    cd {{ $app_dir }}
    git reset --hard HEAD && git clean -fd
    git pull origin main
@endtask

@task('run_composer')
    echo "* Starting deployment ({{ $release }})"
    cd {{ $app_dir }}
    composer install --optimize-autoloader -q
@endtask

@task('run_deploy_scripts')
    echo '* Running deployment scripts'
    cd {{ $app_dir }}
    npm install
    npm run build
    php81 artisan optimize
    php81 artisan view:cache
    php81 artisan migrate --force
    php81 artisan octane:reload
@endtask

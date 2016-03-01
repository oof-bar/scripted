namespace :assets do
  desc 'Compile Sass and CoffeeScript with Gulp'
  task :compile do
    run_locally do
      execute 'gulp build'
    end
  end

  desc 'Create Static Asset Directories'
  task :create_asset_dirs do
    on roles(:web) do
      execute :mkdir, "#{release_path}/wp-content/themes/scripted/assets/css"
      execute :mkdir, "#{release_path}/wp-content/themes/scripted/assets/js"
    end
  end

  desc 'Upload Static Assets'
  task :upload do
    on roles(:web) do
      ['wp-content/themes/scripted/assets/css/app.css', 'wp-content/themes/scripted/assets/js/app.js'].each do |asset|
        upload! asset, "#{release_path}/#{asset}"
      end
    end
  end
end

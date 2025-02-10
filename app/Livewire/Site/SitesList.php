<?php

namespace App\Livewire\Site;

use App\Models\Site;
use Livewire\Component;
use App\Models\Settings;
use App\Models\Submodule;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SitesList extends Component
{
    use WithPagination;
    public $maxSite;
    public $destinationDirectory;
    public $createdSiteDirectory;

    public function mount(){
        $setting = Settings::first();
        $this->maxSite = $setting->max_site;
        $this->destinationDirectory = $setting->active_directory;
        $this->createdSiteDirectory = $this->destinationDirectory.'/created-sites';
    }

    public function render()
    {
        $sites = Site::paginate(6);

        return view('livewire.site.sites-list', [
            'sites' => $sites
        ]);
    }

    public function build($siteId)
    {
        // Find the site by ID
        $site = Site::find($siteId);

        if (!$site) {
            session()->flash('error', 'Site not found.');
            return;
        }

        if ($site->status !== 'DRAFT') {
            session()->flash('warning', 'Only DRAFT sites can be built.');
            return;
        }

        try{
            $websiteModules = $site->modules;
            $submodules = Submodule::whereIn('module_id', $websiteModules->pluck('id'))
                ->join('modules', 'submodules.module_id', '=', 'modules.id')
                ->select('submodules.*', 'modules.name as module')
                ->get();
            
            $companyName = $site->company;
            $email = $site->email;
            $mobile_no = $site->contact_number;
            $slug = Str::slug($site->website_name);

            ini_set('max_execution_time', 600);

            $siteIndex = 0;
            
            for($i = 1; $i <= $this->maxSite; $i++){
                if(File::exists($this->destinationDirectory.'/vacant-sites/wsi-standards'.$i)) {
                    $siteIndex = $i;
                    $site->update(['vacant_folder' => 'wsi-standards'.$siteIndex]);
                    break;
                }
            }

            if($siteIndex == 0){
                //return redirect()->route('website.index')->with('error', 'No Site Available.');
                session()->flash('error', 'No Site Available.');
                return;
            }

            $oldPath    = $this->destinationDirectory.'/vacant-sites/wsi-standards'.$siteIndex;
            $newProject = $this->destinationDirectory.'/vacant-sites/'.$slug;
            File::move($oldPath, $newProject);

            //transfer theme assets
            $sourceAsset = $this->destinationDirectory.'/themes/'.$site->theme->path.'/assets';
            $targetAsset = $newProject.'/public/theme';
            File::copyDirectory($sourceAsset, $targetAsset);

            //transfer theme views
            $sourceView = $this->destinationDirectory.'/themes/'.$site->theme->path.'/views';
            $targetView = $newProject.'/resources/views/theme';
            File::copyDirectory($sourceView, $targetView);

            //transfer logo
            $sourceLogo = storage_path('app/public/'.$site->logo);
            $destinationLogo = $newProject.'/public/storage/logos/site-logo.png';
            File::copy($sourceLogo, $destinationLogo);

            //create db & setting up environment and seeders
            DB::statement("DROP DATABASE IF EXISTS `wsi-$slug`");
            DB::statement("CREATE DATABASE `wsi-$slug`");

            DB::statement("USE `wsi-$slug`");
            DB::unprepared(file_get_contents(public_path('sql/wsi-site.sql')));
            DB::unprepared(file_get_contents($this->destinationDirectory.'/themes/'.$site->theme->path.'/assets/content.sql'));

            DB::statement("UPDATE settings SET website_name = '$companyName', company_name = '$companyName', email = '$email', mobile_no = '$mobile_no' WHERE id = 1");
            DB::statement("UPDATE banners SET image_path = ? WHERE id = 4", [ env('APP_URL') . '/wsi-sites/created-sites/' . $slug . '/storage/banners/banner.png']);
            DB::statement("UPDATE users SET email = '$email' WHERE id = 1");
            $this->seedPermissions($submodules->toArray());
            
            $this->configureEnvFile('DB_DATABASE', 'wsi-' . $slug, $newProject);
            //$this->configureEnvFile('APP_URL', 'http://127.0.0.1:' . $website->port, $newProject);
            $this->configureEnvFile('APP_NAME', '"'.$site->website_name.'"', $newProject);
            $this->configureEnvFile('APP_URL', env('APP_URL') . '/wsi-sites/created-sites/' . $slug . '/public', $newProject);
            $this->configureEnvFile('DB_PORT', env('DB_PORT'), $newProject);
            $this->changeSeederValues('company_name', $companyName, $newProject);
            $this->changeSeederValues('website_name', $companyName, $newProject);
            $this->updatePermissionsSeeder($submodules, $newProject);
        
            File::moveDirectory($newProject, $this->createdSiteDirectory.'/'.$slug);
            DB::statement("USE `site-maker-v2`");
            $site->update(["status" => "BUILT"]);
            
            session()->flash('success', 'Site named '.$site->website_name.' has been successfully built!');
            
        }catch(Exception $e){
            session()->flash('error', 'An error occurred while building the site "' . $site->website_name . '". Please try again later. Error: ' . $e->getMessage());
            return;
        }
    }

    public function configureEnvFile($key, $newValue, $destinationDirectory)
    {
        $envFilePath = $destinationDirectory . '/.env';
        $currentEnvContent = file_get_contents($envFilePath);
        $newConfig = $key . '=' . $newValue;

        $updatedEnvContent = preg_replace(
            '/^' . preg_quote($key, '/') . '\s*=.*$/m',
            $newConfig,
            $currentEnvContent
        );

        file_put_contents($envFilePath, $updatedEnvContent);
    }

    public function changeSeederValues($key, $companyName, $destinationDirectory) {
        $SettingSeeder = $destinationDirectory . '/database/seeders/SettingSeeder.php';
        $escapedCompanyName = preg_quote($companyName, '/');
    
        $currentSeeder = file_get_contents($SettingSeeder);
        $newSeeder = "'$key' => '$escapedCompanyName',";
        $updatedSeederContent = preg_replace(
            "/('$key' =>\s*')([^']+)(.*)/",
            $newSeeder,
            $currentSeeder
        );
    
        if ($updatedSeederContent === null) {
            throw new \Exception("Failed to update $key in the seeder file.");
        }
    
        file_put_contents($SettingSeeder, $updatedSeederContent);
    }

    public function updatePermissionsSeeder($websiteModules, $destinationDirectory) {
        $seederFile = $destinationDirectory . '/database/seeders/PermissionsSeeder.php';
        $currentSeeder = file_get_contents($seederFile);
        $websiteModulesArray = $websiteModules->toArray();
    
        $permissionsArray = array_map(function ($module) {
            return [
                'name' => '"' .  $module['name'] . '"',
                'is_view_page' => 0,
                'module' => '"' .  $module['module'] . '"',
                'description' => '""',
                'routes' => '""',
                'methods' => '""',
                'user_id' => 1,
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ];
        }, $websiteModulesArray);
    
        $formattedArray = '['  . PHP_EOL . implode(', ' . PHP_EOL, array_map(function ($permission) {
            return '            [' . implode(', ', array_map(function ($key, $value) {
                return '"' . $key . '" => ' . $value;
            }, array_keys($permission), $permission)) . ']';
        }, $permissionsArray))  . PHP_EOL . '       ];';
    
        $updatedSeederContent = preg_replace(
            '/\$permissions\s*=\s*\[.*?\];/s',
            '$permissions = ' . $formattedArray,
            $currentSeeder
        );
    
        if ($updatedSeederContent === null) {
            throw new \Exception("Failed to update 'name' in the seeder file.");
        }
    
        file_put_contents($seederFile, $updatedSeederContent);
    }

    public function seedPermissions($websiteModules){
        foreach($websiteModules as $module){
            $name = $module["name"];
            $moduleName = $module["module"];
            DB::statement("INSERT INTO permissions (name, module, description, routes, methods, user_id, is_view_page, created_at, updated_at, deleted_at) VALUES
            ('$name', '$moduleName', '', '', '', 1, 0, now(), now(), NULL)");
        }
    }

    public function launch($siteId)
    {
        // Validate that the site exists
        $site = Site::find($siteId);
        
        if (!$site) {
            session()->flash('error', 'Site not found.');
            return;
        }

        $slug = Str::slug($site->website_name);
        $siteUrl = "http://localhost/wsi/wsi-sites/created-sites/{$slug}/public";

        $this->dispatch('site-launch', ['url' => $siteUrl]);
    }


    public function view($siteId){
        
    }
}

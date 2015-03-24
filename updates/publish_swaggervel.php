<?php namespace DMA\Friends\Updates;

use File;
use Log;
use October\Rain\Database\Updates\Migration;
/**
 * Publish config and assests jlapp/swaggervel
 */
class PublishSwaggervel extends Migration
{
    public function __construct()
    {
        $this->package_config_filepath = __DIR__.'/../vendor/jlapp/swaggervel/src/config/app.php';
        $this->published_config_filepath = app_path('config/packages/jlapp/swaggervel/app.php');

        $this->pacakge_assets_folderpath = __DIR__.'/../vendor/jlapp/swaggervel/public/';
        $this->published_assets_folderpath = public_path('uploads/public/packages/jlapp/swaggervel/');
        Log::info(public_path('uploads/public/packages/jlapp/swaggervel/'));
        //throw \Exception('boom');
    }
    public function up()
    {
        // Copy config file
        if ( File::exists($this->package_config_filepath) && !File::exists($this->published_config_filepath) )
        {
            File::makeDirectory(dirname($this->published_config_filepath), 0777, true);
            File::copy($this->package_config_filepath, $this->published_config_filepath);
        }
        
        // Copy public assets
        if ( File::exists($this->pacakge_assets_folderpath) && !File::exists($this->published_assets_folderpath) )
        {
            File::makeDirectory($this->published_assets_folderpath, 0777, true);
            File::copyDirectory($this->pacakge_assets_folderpath, $this->published_assets_folderpath);
        }        
    }
    public function down()
    {
        // Delete config file
        File::delete($this->published_config_filepath);
        // Delete assets
        File::delete($this->published_assets_folderpath);
    }
}
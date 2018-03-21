<?php 

namespace App;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;

class Documentation 
{

    protected $files;
    protected $cache;

    public function __construct(Filesystem $files, Cache $cache) 
    {
        $this->files = $files;
        $this->cache = $cache;
    }

    public function getIndex($version) 
    {
        return $this->cache->remember('docs.'.$version.'.index', 5, function() use ($version) {
            $path = base_path('resources/docs/'.$version.'/documentation.md');

            if ($this->files->exists($path)) {
                return $this->replaceLinks($version, markdown($this->files->get($path)));
            }

            return null;
        });
    }

    public function get($version, $page) 
    {
        return $this->cache->remember('docs.'.$version.'.'.$page, 5, function() use ($version, $page) {
            $path = base_path('resources/docs/'.$version.'/'.$page.'.md');

            if ($this->files->exists($path)) {
                return $this->replaceLinks($version, markdown($this->files->get($path)));
            }
    
            return null;
        });
    }

    public static function replaceLinks($version, $content) {
        return str_replace('{{version}}', $version, $content);
    }

    public function sectionExists($version, $page) 
    {
        return $this->files->exists(
            base_path('resources/docs/'.$version.'/'.$page.'.md')
        );
    }

    public static function getDocVersions() {
        return [
            '1.0' => '1.0'
        ];
    }

}

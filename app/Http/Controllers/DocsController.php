<?php

namespace App\Http\Controllers;

use App\Documentation;
use Symfony\Component\DomCrawler\Crawler;

class DocsController extends Controller
{
    
    protected $docs;

    public function __construct(Documentation $docs) 
    {
        $this->docs = $docs;
    }
    
    public function showRootPage() 
    {
        return redirect('docs/'.DEFAULT_VERSION);
    }

    public function show($version, $page = null) 
    {
        if (! $this->isVersion($version)) {
            return redirect('docs/'.DEFAULT_VERSION.'/'.$version, 301);
        }

        if (! defined('CURRENT_VERSION')) {
            define('CURRENT_VERSION', $version);
        }

        $sectionPage = $page ?: 'introduction';
        $content = $this->docs->get($version, $sectionPage);

        if (is_null($content)) {
            return response()->view('docs.index', [
                'title' => 'Page not found',
                'index' => $this->docs->getIndex($version),
                'content' => view('docs.missing'),
                'currentVersion' => $version,
                'versions' => Documentation::getDocVersions(),
                'currentSection' => '',
                'canonical' => null
            ], 404);
        }

        $title = (new Crawler($content))->filterXPath('//h1');
        $section = '';

        if ($this->docs->sectionExists($version, $page)) {
            $section .= '/'.$page;
        } elseif (! is_null($page)) {
            return redirect('docs/'.$version);
        }

        $canonical = null;

        if ($this->docs->sectionExists(DEFAULT_VERSION, $sectionPage)) {
            $canonical = 'docs/'.DEFAULT_VERSION.'/'.$sectionPage;
        }

        return view('docs.index', [
            'title' => count($title) ? $title->text() : null,
            'index' => $this->docs->getIndex($version),
            'content' => $content,
            'currentVersion' => $version,
            'versions' => Documentation::getDocVersions(),
            'currentSection' => $section,
            'canonical' => $canonical
        ]);

    }

    protected function isVersion($version) {
        return in_array($version, array_keys(Documentation::getDocVersions()));
    }

}

<?php

namespace Scraper\Source;

use Scraper\Utility\LazyProperties;

class PageSniffer
{
    use LazyProperties;

    /**
     * Array of properties which this should be lazily evaluated.
     *
     * Also accepts boolean values:
     *  - false = nothing is lazy (this trait will do nothing)
     *  - true = every property is lazy
     *
     * @var array|bool
     */
    protected $lazyProperties = [
        'pageHasHeader',
        'isHomepage',
        'isNewsPage',
        'isUnwantedPage',
        'isDisciplinaryStatementsPage',
        'isDisciplinaryStatementsChildPage',
        'isAdvisoryCommitteePage',
        'hasAChecklist',
        'hasALinkList',
    ];

    /**
     * Holds the resource object which we're sniffing.
     *
     * @var Resource
     */
    public $resource = null;

    /**
     * Class constructor
     *
     * @param \Scraper\Source\Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    public function getPageHasHeader()
    {
        $crawler = $this->resource->getCrawler();
        $header = $crawler->filter('#header');
        return (count($header) > 0);
    }

    public function getIsHomepage()
    {
        return ($this->resource->relativeUrl == 'index.htm');
    }

    public function getIsNewsPage()
    {
        return ($this->resource->relativeUrl == 'latest-news.htm');
    }

    public function getIsUnwantedPage()
    {
        $excludeUrls = [
            'sitemap.htm', // Sitemap is empty
        ];
        return (in_array($this->resource->relativeUrl, $excludeUrls));
    }

    public function getIsDisciplinaryStatementsPage()
    {
        return (
            stripos($this->resource->meta['title'], 'Disciplinary statements') !== false &&
            stripos($this->resource->meta['title'], 'Publication Policy') === false
        );
    }

    public function getIsDisciplinaryStatementsChildPage()
    {
        return (
            stripos($this->resource->meta['title'], 'Disciplinary statements') !== false &&
            stripos($this->resource->meta['title'], 'Publication Policy') !== false
        );
    }

    public function getIsAdvisoryCommitteePage()
    {
        return ($this->resource->relativeUrl == 'contact-advisory-committee.htm');
    }

    public function getHasAChecklist()
    {
        $crawler = $this->resource->getCrawler();
        $tickCross = $crawler->filter('.left-column .column-head-tick, .right-column .column-head-cross');
        return (count($tickCross) == 2);
    }

    public function getHasALinkList()
    {
        $crawler = $this->resource->getCrawler();
        $list = $crawler->filter('ul.link-list');
        return (count($list) > 0);
    }
}

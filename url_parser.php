<?php

$inputUrl = getUrlOption();
print_r(index($inputUrl));

/**
 * @return string|null
 */
function getUrlOption(): ?string
{
    $shortopts = "u:";

    $longopts  = [
        "url::",
    ];

    $options = getopt($shortopts, $longopts);

    if (isset($options['u'])) {
        return $options['u'];
    }

    if (isset($options['url'])) {
        return $options['url'];
    }

    return $GLOBALS['argv'][1] ?? null;
}

/**
 * @param string $url
 * @return array|string
 */
function index(string $url)
{
    if (validateUrl($url)) {
        $parsedUrl = parseUrl($url);
        return toJson($parsedUrl);
    }

    return 'Enter URL in valid format' . PHP_EOL;
}

/**
 * @param string $url
 * @return bool
 */
function validateUrl(string $url): bool
{
    return (bool)filter_var($url, FILTER_VALIDATE_URL);
}

/**
 * @param string $url
 * @return array
 */
function parseUrl(string $url): array
{
    $parsedUrl = parse_url($url);

    $host = $parsedUrl['host'];

    $domainData = parseDomainData($host);

    $parsedUrl['domain'] = $domainData['domain'];

    if (isset($domainData['subdomain'])) {
        $parsedUrl['subdomain'] = $domainData['subdomain'];
    }

    $parsedUrl['tld'] = parseTld($host);

    $sld = parseSld($host);
    if ($sld !== null) {
        $parsedUrl['sld'] = $sld;
    }

    $extension = parseExtension($url);
    if (isset($parsedUrl['path']) && $extension) {
        $parsedUrl['extension'] = $extension;
    }

    if (isset($parsedUrl['query'])) {
        $parsedUrl['parsedQuery'] = parseQuery($parsedUrl['query']);
    }

    return $parsedUrl;
}

/**
 * @param $host
 * @return array
 */
function parseDomainData($host): array
{
    $part = parseSld($host) ?? parseTld($host);

    $matches = [];

    if (preg_match("/(?P<domain_data>.*)\.$part/", $host, $matches) === false) {
        return [];
    }

    $pieces = explode('.', $matches['domain_data']);

    $domainData['domain'] = array_pop($pieces).'.'.$part;

    if (!empty($pieces)) {
        $domainData['subdomain'] = implode($pieces, '.');
    }

    return $domainData;
}

/**
 * @param $url
 * @return string
 */
function parseTld($host): string
{
    $pieces = explode('.', $host);
    return array_pop($pieces);
}

/**
 * @param $host
 * @return string|null
 */
function parseSld($host): ?string
{
    $pieces = explode('.', $host);
    $tld = array_pop($pieces);
    $sldPrefix = array_pop($pieces);

    if (in_array($tld, getConfig('cctld_list')) && in_array($sldPrefix, getConfig('sld_list'))) {
        return $sldPrefix . '.' . $tld;
    }

    return null;
}

/**
 * @param $url
 * @return string
 */
function parseExtension($url): ?string
{
    $info = pathinfo($url, PATHINFO_EXTENSION);
    if (!empty($info)) {
        return $info;
    }
    return null;
}

/**
 * @param string $query
 * @return array|null
 */
function parseQuery(string $query): ?array
{
    if (empty($query)) {
        return null;
    }

    $parsedQuery = [];

    foreach (explode('&', $query) as $val) {
        $val = explode('=', $val);
        $parsedQuery[$val[0]] = $val[1];
    }

    return $parsedQuery;
}

/**
 * @param $url
 * @return false|string
 */
function toJson($url)
{
    return json_encode($url, JSON_PRETTY_PRINT);
}

/**
 * @param string $name
 * @return array
 */
function getConfig(string $name): array
{
    $config = include 'config.php';
    return $config[$name] ?? [];
}
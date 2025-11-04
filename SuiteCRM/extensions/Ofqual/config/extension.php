<?php

use Symfony\Component\DependencyInjection\Container;

if (!isset($container)) {
    return;
}

/** @var Container $container */
$extensions = $container->getParameter('extensions') ?? [];

$extensions['Ofqual'] = [
    'remoteEntry' => '../extensions/Ofqual/remoteEntry.js',
    'remoteName' => 'Ofqual',
    'enabled' => false,
    'extension_name' => 'Ofqual Extension',
    'extension_uri' =>  'https://www.ofqual.gov.uk',
    'description' => 'An extension for Ofqual integration',
    'version' =>  '1.0.0',
    'author' =>  'Ofqual',
    'author_uri' =>  'https://www.ofqual.gov.uk',
    'license' =>  'MIT'
];

$container->setParameter('extensions', $extensions);
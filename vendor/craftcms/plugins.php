<?php

$vendorDir = dirname(__DIR__);
$rootDir = dirname(dirname(__DIR__));

return array (
  'spicyweb/craft-embedded-assets' => 
  array (
    'class' => 'spicyweb\\embeddedassets\\Plugin',
    'basePath' => $vendorDir . '/spicyweb/craft-embedded-assets/src',
    'handle' => 'embeddedassets',
    'aliases' => 
    array (
      '@spicyweb/embeddedassets' => $vendorDir . '/spicyweb/craft-embedded-assets/src',
    ),
    'name' => 'Embedded Assets',
    'version' => '3.1.8',
    'schemaVersion' => '1.0.0',
    'description' => 'Manage YouTube videos, Instagram photos, Twitter posts and more as first class assets',
    'developer' => 'Spicy Web',
    'developerUrl' => 'https://spicyweb.com.au',
    'documentationUrl' => 'https://github.com/spicywebau/craft-embedded-assets/blob/3.1.8/README.md',
    'changelogUrl' => 'https://github.com/spicywebau/craft-embedded-assets/blob/3.x/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/spicywebau/craft-embedded-assets/archive/3.1.8.zip',
  ),
  'craftcms/redactor' => 
  array (
    'class' => 'craft\\redactor\\Plugin',
    'basePath' => $vendorDir . '/craftcms/redactor/src',
    'handle' => 'redactor',
    'aliases' => 
    array (
      '@craft/redactor' => $vendorDir . '/craftcms/redactor/src',
    ),
    'name' => 'Redactor',
    'version' => '3.0.4',
    'description' => 'Edit rich text content in Craft CMS using Redactor by Imperavi.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/redactor/blob/v2/README.md',
  ),
);

<?php

namespace Drupal\author\Infrastructure\Persistence\S3;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

final class S3Factory
{
    public static function create()
    {
        $client = new S3Client([
            'credentials' => [
                'key'    => 'YOUR KEY',
                'secret' => 'YOUR SECRET KEY'
            ],
            'region'  => 'eu-west-1',
            'version' => 'latest'
        ]);

        $aws3adapter = new AwsS3Adapter($client, 'YOUR BUCKET NAME');
        return new Filesystem($aws3adapter);
    }
}
<?php
use Pangu\Metadata\MetadataGenerator;
use Pangu\Metadata\MetaProtocol;

$generator = new MetadataGenerator();
$generator->title('My Site Name');
$generator->description('My Site Description : Lorem Ipsum Dolores Umbra');
$generator->url();
$generator->author('Anthony Pauwels');
$generator->image('/dist/img/facebook.png', ['width' => 1200, 'height' => 600, 'type' => 'PNG'], MetaProtocol::OPENGRAPH );
$generator->image('/dist/img/twitter.png', ['width' => 600, 'height' => 400, 'type' => 'PNG'], MetaProtocol::TWITTER );
$generator->twitterCard();
$generator->type();

$generator->print(); // print all tags

$generator->print(MetaProtocol::OPENGRAPH ); // print Opengraph tags

$generator->print(MetaProtocol::META | MetaProtocol::TWITTER ); // print meta and twitter tags

//$generator->setTags(
//    [
//        'title' => 'My Site Title',
//        'description' => [ 'My Site Description : Lorem Ipsum Dolores Umbra', MetaProtocol::OPENGRAPH ],
//        MetaProtocol::TWITTER => [
//            'image' => [
//                '/dist/img/twitter.png', ['width' => 600, 'height' => 400, 'type' => 'PNG']
//            ]
//        ]
//    ]
//);
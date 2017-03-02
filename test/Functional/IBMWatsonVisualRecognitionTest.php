<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');
class MailboxlayerTest extends BaseTestCase {

    public function testListMetrics() {

        $routes = [
            'findSimilarImagesInCollection',
            'deleteSingleImageMetadata',
            'getSingleImageMetadata',
            'updateImageMetadata',
            'addMetadataToImage',
            'deleteImageFromCollection',
            'getCollectionSingleImage',
            'getCollectionImages',
            'addImageToCollection',
            'deleteCollection',
            'getSingleCollection',
            'getCollections',
            'createCollection',
            'deleteClassifier',
            'updateClassifier',
            'getSingleClassifier',
            'getCustomClassifiers',
            'createClassifier',
            'detectFaces',
            'classifyImage'

        ];

        foreach($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/IBMWatsonVisualRecognition/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }

}

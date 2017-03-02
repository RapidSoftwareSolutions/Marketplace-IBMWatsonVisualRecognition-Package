       <?php
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
    'classifyImage',
        'metadata'
       ];
       foreach ($routes as $file) {
           require __DIR__ . '/../src/routes/' . $file . '.php';
       }


[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/IBMWatsonVisualRecognition/functions?utm_source=RapidAPIGitHub_IBMWatsonVisualRecognitionFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# IBMWatsonVisualRecognition Package
IBMWatsonVisualRecognition
* Domain: ibm.com
* Credentials: apiKey

## How to get credentials: 
1. Register to [IBM Bluemix Console](https://console.ng.bluemix.net)
2. After log in choose Visual Recognition from [services](https://console.ng.bluemix.net/catalog/?category=watson)
3. Connect Visual Recognition to your application at the left side, choose pricing plan and click on 'Create' button at the bottom of the page.
4. Click on 'Service Credentials' tab to see your api key.

## IBMWatsonVisualRecognition.classifyImage
Upload URLs to identify classes by default.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from IBM
| version       | String     | The release date of the version of the API you want to use.
| imageUrl      | String     | The URL of an image (.jpg, or .png).
| owners        | Array      | An array with the value(s) 'IBM' and/or 'me' to specify which classifiers to run.
| classifierIds | Array      | An array of the classifier IDs used to classify the images. 'Default' is the classifier_id of the built-in classifier.
| threshold     | String     | A floating value that specifies the minimum score a class must have to be displayed in the response. Setting the threshold to 0.0 will return all values, regardless of their classification score.
| threshold     | String     | A floating value that specifies the minimum score a class must have to be displayed in the response. Setting the threshold to 0.0 will return all values, regardless of their classification score.
| acceptLanguage| String     | Specifies the language of the output. You can specify en for English, es for Spanish, ar for Arabic, or ja for Japanese. Classifiers for which no translation is available are ommitted.

## IBMWatsonVisualRecognition.detectFaces
Analyze faces in images and get data about them, such as estimated age, gender, plus names of celebrities. 

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from IBM
| version | String     | The release date of the version of the API you want to use.
| imageUrl| String     | The URL of an image (.jpg, or .png).

## IBMWatsonVisualRecognition.createClassifier
Train a new multi-faceted classifier on the uploaded image data.

| Field                     | Type       | Description
|---------------------------|------------|----------
| apiKey                    | credentials| Api key obtained from IBM
| version                   | String     | The release date of the version of the API you want to use.
| className                 | String     | The name of the new classifier.
| positiveExampleImages1    | File       | A compressed (.zip) file of images that depict the visual subject for a class within the new classifier. Must contain a minimum of 10 images. Minimum recommend size is 32X32 pixels.
| positiveExampleImagesName1| String     | The name of the positive examples in 1 file
| positiveExampleImages2    | File       | A compressed (.zip) file of images that depict the visual subject for a class within the new classifier. Must contain a minimum of 10 images. Minimum recommend size is 32X32 pixels.
| positiveExampleImagesName2| String     | The name of the positive examples in 2 file
| negativeExampleImages     | File       | A compressed (.zip) file of images that do not depict the visual subject of any of the classes of the new classifier. Must contain a minimum of 10 images.

## IBMWatsonVisualRecognition.getCustomClassifiers
Retrieve a list of user-created classifiers.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key obtained from IBM
| version| String     | The release date of the version of the API you want to use.
| verbose| Boolean    | Specify true to return classifier details. Omit this parameter to return a brief list of classifiers.

## IBMWatsonVisualRecognition.getSingleClassifier
Retrieve information about a specific classifier.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| classifierId| String     | The ID of the classifier for which you want details.

## IBMWatsonVisualRecognition.updateClassifier
Update an existing classifier by adding new classes, or by adding new images to existing classes.

| Field                    | Type       | Description
|--------------------------|------------|----------
| apiKey                   | credentials| Api key obtained from IBM
| version                  | String     | The release date of the version of the API you want to use.
| classifierId             | String     | The id of the classifier.
| positiveExampleImages    | File       | A compressed (.zip) file of images that depict the visual subject for a class within the new classifier. Must contain a minimum of 10 images. Minimum recommend size is 32X32 pixels.
| positiveExampleImagesName| String     | The name of the positive examples in 1 file
| negativeExampleImages    | File       | A compressed (.zip) file of images that do not depict the visual subject of any of the classes of the new classifier. Must contain a minimum of 10 images.

## IBMWatsonVisualRecognition.deleteClassifier
Delete a specific classifier.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| classifierId| String     | The ID of the classifier for which you want to delete.

## IBMWatsonVisualRecognition.createCollection
Beta. Create a new collection of images to search. You can create a maximum of 5 collections.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from IBM
| version       | String     | The release date of the version of the API you want to use.
| collectionName| String     | The name of the new collection. The name can be a maximum of 128 UTF8 characters, with no spaces.

## IBMWatsonVisualRecognition.getCollections
Beta. List all custom collections.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| Api key obtained from IBM
| version| String     | The release date of the version of the API you want to use.

## IBMWatsonVisualRecognition.getSingleCollection
Beta. Retrieve information about a specific collection.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| collectionId| String     | The id of the collection.

## IBMWatsonVisualRecognition.addImageToCollection
Beta. Add images to a collection. Each collection can contain 1000000 images. It takes 1 second to upload 1 images, so uploading 1000000 images takes 11 days.

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from IBM
| version      | String     | The release date of the version of the API you want to use.
| collectionId | String     | The id of the collection.
| imageFile    | File       | Image file
| imageMetadata| String     | A json object file that adds metadata to the image. This can be anything that can be specified in a JSON object. For example, key-value pairs. 

## IBMWatsonVisualRecognition.getCollectionImages
Beta. List 100 images in a collection. This returns an arbitrary selection of 100 images. Each collection can contain 1000000 images.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| collectionId| String     | The id of the collection.

## IBMWatsonVisualRecognition.getCollectionSingleImage
Beta. List details about a specific image in a collection.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| collectionId| String     | The id of the collection.
| imageId     | String     | The id of the image.

## IBMWatsonVisualRecognition.addMetadataToImage
Beta. Add metadata to a specific image in a collection. Use metadata for your own reference to identify images. 

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| Api key obtained from IBM
| version          | String     | The release date of the version of the API you want to use.
| collectionId     | String     | The id of the collection.
| imageId          | String     | The id of the image.
| imageMetadataFile| File       | A json object file that adds metadata to the image. This can be anything that can be specified in a JSON object. For example, key-value pairs. 

## IBMWatsonVisualRecognition.updateImageMetadata
Beta. Update  metadata to a specific image in a collection.

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| Api key obtained from IBM
| version          | String     | The release date of the version of the API you want to use.
| collectionId     | String     | The id of the collection.
| imageId          | String     | The id of the image.
| imageMetadataFile| File       | A json object file that adds metadata to the image. This can be anything that can be specified in a JSON object. For example, key-value pairs. 

## IBMWatsonVisualRecognition.getSingleImageMetadata
Beta. View the metadata for a specific image in a collection.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| collectionId| String     | The id of the collection.
| imageId     | String     | The id of the image.

## IBMWatsonVisualRecognition.deleteSingleImageMetadata
Beta. Delete the metadata for a specific image in a collection.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| collectionId| String     | The id of the collection.
| imageId     | String     | The id of the image.

## IBMWatsonVisualRecognition.findSimilarImagesInCollection
Beta. Upload an image to find similar images in your custom collection.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| collectionId| String     | The id of the collection.
| imageFile   | File       | The image file (.jpg or .png) of the image to search against the collection. Minimum recommend size is 32X32 pixels.
| limit       | Number     | The number of similar results you want returned. Default limit is 10 results, you can specify a maximum limit of 100 results.

## IBMWatsonVisualRecognition.deleteImageFromCollection
Beta. Delete an image from a collection.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| collectionId| String     | The id of the collection.
| imageId     | String     | The id of the image.

## IBMWatsonVisualRecognition.deleteCollection
Beta. Delete a specific collection.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use.
| collectionId| String     | The id of the collection.


[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/IBMWatsonVisualRecognition/functions?utm_source=RapidAPIGitHub_IBMWatsonVisualRecognitionFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# IBMWatsonVisualRecognition Package
IBMWatsonVisualRecognition
* Domain: [IBM](http://ibm.com)
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
| version       | String     | The release date of the version of the API you want to use. Specify dates in YYYY-MM-DD format. The current version is 2016-05-20.
| imageUrl      | String     | The URL of an image (.jpg, or .png).
| owners        | Array      | An array with the value(s) 'IBM' and/or 'me' to specify which classifiers to run.
| classifierIds | Array      | An array of the classifier IDs used to classify the images. 'Default' is the classifier_id of the built-in classifier.
| threshold     | String     | A floating value that specifies the minimum score a class must have to be displayed in the response. Setting the threshold to 0.0 will return all values, regardless of their classification score.
| acceptLanguage| String     | The 2-letter primary language code as assigned in ISO standard 639. Supported languages are en (English), ar (Arabic), de (German), es (Spanish), it (Italian), ja (Japanese), and ko (Korean).

## IBMWatsonVisualRecognition.detectFaces
Analyze faces in images and get data about them, such as estimated age, gender, plus names of celebrities. 

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from IBM
| version | String     | The release date of the version of the API you want to use. Specify dates in YYYY-MM-DD format. The current version is 2016-05-20.
| imageUrl| String     | The URL of an image (.jpg, or .png).

## IBMWatsonVisualRecognition.createClassifier
Train a new multi-faceted classifier on the uploaded image data.

| Field                     | Type       | Description
|---------------------------|------------|----------
| apiKey                    | credentials| Api key obtained from IBM
| version                   | String     | The release date of the version of the API you want to use. Specify dates in YYYY-MM-DD format. The current version is 2016-05-20.
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
| version| String     | The release date of the version of the API you want to use. Specify dates in YYYY-MM-DD format. The current version is 2016-05-20.
| verbose| Boolean    | Specify true to return classifier details. Omit this parameter to return a brief list of classifiers.

## IBMWatsonVisualRecognition.getSingleClassifier
Retrieve information about a specific classifier.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use. Specify dates in YYYY-MM-DD format. The current version is 2016-05-20.
| classifierId| String     | The ID of the classifier for which you want details.

## IBMWatsonVisualRecognition.updateClassifier
Update an existing classifier by adding new classes, or by adding new images to existing classes.

| Field                    | Type       | Description
|--------------------------|------------|----------
| apiKey                   | credentials| Api key obtained from IBM
| version                  | String     | The release date of the version of the API you want to use. Specify dates in YYYY-MM-DD format. The current version is 2016-05-20.
| classifierId             | String     | The id of the classifier.
| positiveExampleImages    | File       | A compressed (.zip) file of images that depict the visual subject for a class within the new classifier. Must contain a minimum of 10 images. Minimum recommend size is 32X32 pixels.
| positiveExampleImagesName| String     | The name of the positive examples in 1 file
| negativeExampleImages    | File       | A compressed (.zip) file of images that do not depict the visual subject of any of the classes of the new classifier. Must contain a minimum of 10 images.

## IBMWatsonVisualRecognition.deleteClassifier
Delete a specific classifier.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from IBM
| version     | String     | The release date of the version of the API you want to use. Specify dates in YYYY-MM-DD format. The current version is 2016-05-20.
| classifierId| String     | The ID of the classifier for which you want to delete.

<?php
$app->post('/api/IBMWatsonVisualRecognition/createClassifier', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'className', 'version', 'positiveExampleImages1', 'positiveExampleImagesName1', 'positiveExampleImages2', 'positiveExampleImagesName2' ]);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "classifiers?api_key=".$post_data['args']['apiKey'].'&version='.$post_data['args']['version'];
    $body = array();
    var_dump($post_data['args']['positiveExampleImages1'], $post_data['args']['positiveExampleImages2']);
    exit();

    $body[] =
        [
            'name' => $post_data['args']['positiveExampleImagesName1'].'_positive_examples',
            'contents' => fopen($post_data['args']['positiveExampleImages1'], r)
        ];
    $body[] =
        [
            'name' => $post_data['args']['positiveExampleImagesName2'].'_positive_examples',
            'contents' => fopen($post_data['args']['positiveExampleImages2'], r)
        ];
    $body[] =
        [
            'name' => 'name',
            'contents' => $post_data['args']['className']
        ];

    if (isset($post_data['args']['negativeExampleImages']) && strlen($post_data['args']['negativeExampleImages']) > 0){
        $body[] =
            [
                'name' => 'negative_examples',
                'contents' => fopen($post_data['args']['negativeExampleImages'], r)
            ];
    }

    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('POST', $query_str, [
            'multipart' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});
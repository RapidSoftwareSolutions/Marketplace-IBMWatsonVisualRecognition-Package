<?php
$app->post('/api/IBMWatsonVisualRecognition/classifyImage', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'imageUrl', 'version']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "classify";
    $body = array();
    $body['api_key'] = $post_data['args']['apiKey'];
    $body['url'] = $post_data['args']['imageUrl'];
    $body['version'] = $post_data['args']['version'];
    if (isset($post_data['args']['owners']) && strlen($post_data['args']['owners']) > 0){
        $body['owners'] = $post_data['args']['owners'];
    }
    if (isset($post_data['args']['classifierIds']) && strlen($post_data['args']['classifierIds']) > 0){
        $body['classifier_ids'] = $post_data['args']['classifierIds'];
    }
    if (isset($post_data['args']['threshold']) && strlen($post_data['args']['threshold']) > 0){
        $body['threshold'] = $post_data['args']['threshold'];
    }
    if (isset($post_data['args']['acceptLanguage']) && strlen($post_data['args']['acceptLanguage']) > 0){
        $body['Accept-Language'] = $post_data['args']['acceptLanguage'];
    }

    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('GET', $query_str, [
            'query' => $body
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
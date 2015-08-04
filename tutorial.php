    <?php
    
    $client_id = 'ECC17BBF-31DE-4442-9D87-D8AD545DE942';
    $client_secret = 'p3l3lePZQqtatM5uWalcZuZfyGDgovqz';
            
    $curl_post_data = array(
        'code' => filter_input(INPUT_GET,'code'),
        'client_id' => $client_id,
        'client_secret' => $client_secret
    );

    $json = curl_post(filter_input(INPUT_GET,'access_token_url'), $curl_post_data);
    $response = json_decode(utf8_encode($json));
    $access_token = $response->{access_token};

     echo '<h3>Access Token : '.$access_token.'</h3>';

    function curl_post($url, array $post = NULL, array $options = array())
    {
        $defaults = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => http_build_query($post),
            CURLOPT_HEADER => "Content-Type: application/x-www-form-urlencoded",
            CURLOPT_RETURNTRANSFER => TRUE
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    } 

    ?>


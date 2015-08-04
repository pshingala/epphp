    <?php
    include 'connectdb.php';
    
    # check: code and api_url preset as query parameters
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!(empty($_GET["code"]) || empty($_GET["api_url"])) ) {
            $conn = createConnection();
            
            $secrets = getSecrets($conn);
            $access_token = getAccessToken($_GET['code'], $secrets['client_id'],$secrets['client_secret']);
            
            $sql = "SELECT * FROM shops where api_url = '$_GET[api_url]')";
            $result = $conn->query($sql);
            
            # if installing first time or updating existing token
            if($result->num_rows > 0){ 
                $row =  $result->fetch_assoc();
                $sql = "UPDATE shops SET access_token=$response[access_token] WHERE id= $row[id]";    
            }
            else { 
                $sql = "INSERT INTO shops (code, api_url, return_url, access_token)
                        VALUES ('$_GET[code]', '$_GET[api_url]', '$_GET[return_url]','$access_token')";
            }
            
            echo $sql;
            
            # insert token into database
            if (!$conn->query($sql) === TRUE) { 
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            closeConnection($conn);
            
            # redirect to the return_url
            #header("Location: $_GET[return_url]");
            #die();
          }
      }
      
    function getAccessToken($code, $client_id, $client_secret){
        echo $code.$client_id.$client_secret;
        $curl_post_data = array(
                'code' => $code,
                'client_id' => $client_id,
                'client_secret' => $client_secret
            );
            
        $response = curl_post($_GET["access_token_url"], $curl_post_data);
        echo 'token: ' .$response;
        return $response["access_token"];
    }
    
    function getSecrets($conn){
            # get client_id and client_secret from database in order to make next post call
            $sql = "SELECT * FROM secrets order by id desc limit 1";
            $result = $conn->query($sql) or die(mysql_error());
            return  $result->fetch_assoc();
    }

    function curl_post($url, array $post = NULL, array $options = array())
    {
        $result;
        $defaults = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => "Content-Type: application/x-www-form-urlencoded",
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => http_build_query($post)
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if( ! $result = curl_exec($ch))
        {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);
        return $result;
    } 
    
    function curl_get($url, array $get = NULL, array $options = array())
    {   
        $defaults = array(
            CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if( ! $result = curl_exec($ch))
        {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);
        return $result;
    } 
    ?>


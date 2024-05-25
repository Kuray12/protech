<!DOCTYPE html>
<html>
<head>
    <title>IP Scanning</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            margin: 50px auto;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h4 {
            margin-top: 0;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Style for the Scan button */
        .scan-button {
            background-color: #007bff; /* Blue color */
            border: none;
            color: white;
            padding: 10px 20px; /* Larger padding for bigger button */
            text-align: center;
            text-decoration: none;
            display: block; /* Change to block for full width */
            width: 100%; /* Make button full width */
            font-size: 16px;
            margin-top: 10px; /* Margin added for spacing */
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s; /* Smooth transition */
        }
        /* Hover effect for the Scan button */
        .scan-button:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Scanning your IP</h4>
        <form method="GET" action="">
            <label for="ip">Enter an IP for Scanning:</label>
            <input type="text" id="ip" name="ip" placeholder="127.0.0.1" required>
            <button type="submit" class="scan-button">Scan</button>
        </form>
        <?php
        if(isset($_GET['ip']))
        {
            $domain = $_GET['ip'];
            $token = 'dfbe491d28254a';
            $url = 'https://ipinfo.io/' . $domain . '/json';
            $data = file_get_contents($url);
            if($data !== false)
            {
                $info = json_decode($data, true);
                echo '<div>
                    <h4>Results for '.$domain.'</h4>
                    <table>
                        <tr>
                            <th>IP</th>
                            <td>'.(isset($info['ip']) ? $info['ip'] : '-').'</td>
                        </tr>
                        <tr>
                            <th>Hostname</th>
                            <td>'.(isset($info['hostname']) ? $info['hostname'] : '-').'</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>'.(isset($info['city']) ? $info['city'] : '-').'</td>
                        </tr>
                        <tr>
                            <th>Region</th>
                            <td>'.(isset($info['region']) ? $info['region'] : '-').'</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>'.(isset($info['country']) ? $info['country'] : '-').'</td>
                        </tr>
                        <tr>
                            <th>Loc</th>
                            <td>'.(isset($info['loc']) ? $info['loc'] : '-').'</td>
                        </tr>
                        <tr>
                            <th>Postal</th>
                            <td>'.(isset($info['postal']) ? $info['postal'] : '-').'</td>
                        </tr>
                        <tr>
                            <th>Timezone</th>
                            <td>'.(isset($info['timezone']) ? $info['timezone'] : '-').'</td>
                        </tr>
                    </table>
                </div>';
            }
            else
            {
                echo '<div style="color: red;">Failed to retrieve data.</div>';
            }
        }
        ?>
    </div>
</body>
</html>

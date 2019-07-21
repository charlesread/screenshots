<?php
include 'DBController.php';
$db_handle = new DBController();
$makeResult = $db_handle->runQuery("SELECT DISTINCT make FROM cars ORDER BY make ASC");
?>
<html>
<head>
<link href="stylesearch.css" type="text/css" rel="stylesheet" />
<title>Search Car Information</title>
</head>
<body>
    
    <h2>Search Car Information</h2>

    <p><a href="http://codd.cs.gsu.edu/~dvasser1/all/homepage.html"">HOME</a> </p>
    <form method="POST" name="search" action="indexsearch.php">
        <div id="demo-grid">
            <div class="search-box">
                <select id="Place" name="make[]" multiple="multiple">
                    <option value="0" selected="selected">Select Make</option>
                        <?php
                        if (! empty($makeResult)) {
                            foreach ($makeResult as $key => $value) {
                                echo '<option value="' . $makeResult[$key]['make'] . '">' . $makeResult[$key]['make'] . '</option>';
                            }
                        }
                        ?>
                </select><br> <br>
                <button id="Filter">Search</button>
            </div>
            
                <?php
                if (! empty($_POST['make'])) {
                    ?>
                    <table cellpadding="10" cellspacing="1">

                <thead>
                    <tr>
                        <th><strong>CarID</strong></th>
                        <th><strong>color</strong></th>
                        <th><strong>make</strong></th>
                        <th><strong>model</strong></th>
                        <th><strong>year</strong></th>
                        <th><strong>class</strong></th>
                        <th><strong>location</strong></th>
                        <th><strong>price</strong></th>
                        <th><strong>available</strong></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * from cars";
                    $i = 0;
                    $selectedOptionCount = count($_POST['make']);
                    $selectedOption = "";
                    while ($i < $selectedOptionCount) {
                        $selectedOption = $selectedOption . "'" . $_POST['make'][$i] . "'";
                        if ($i < $selectedOptionCount - 1) {
                            $selectedOption = $selectedOption . ", ";
                        }
                        
                        $i ++;
                    }
                    $query = $query . " WHERE make in (" . $selectedOption . ")";
                    
                    $result = $db_handle->runQuery($query);
                }
                if (! empty($result)) {
                    foreach ($result as $key => $value) {
                        ?>
                <tr>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['CarID']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['color']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['make']; ?> </div></td>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['model']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['year']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $result[$key]['class']; ?> </div></td>
                        <td><div class="col" id="user_data_1"><?php echo $result[$key]['location']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['price']; ?> </div></td>
                        <td><div class="col" id="user_data_2"><?php echo $result[$key]['available']; ?> </div></td>
                        
                    </tr>
                <?php
                    }
                    ?>
                    
                </tbody>
            </table>
            <?php
                }
                ?>  
        </div>
    </form>
</body>
</html>
<?php

require "./db.php";

$sql = "SELECT DISTINCT PRODUCTS.NAME, CATEGORIES.CATEGORY, PRODUCTS.PRICE FROM PRODUCTS, CATEGORIES WHERE PRODUCTS.CATEGORY = CATEGORIES.ID";
$response = mysqli_query($link, $sql);

$data = [];

echo "<div class=\"list\">";

{
    if(mysqli_num_rows($response) == 0)
    {
        echo "<h2>Продукты отсутствуют!</h2>";
    }
    else
    {
        echo "<h2 style=\"width: 100%\";>Список категорий:</h2>";

        $rows_amount = mysqli_num_rows($response);

        for($i = 0; $i < $rows_amount; $i++)
        {
            $row = mysqli_fetch_assoc($response);
            
            $inArray = array_reduce($data, function($carry, $item) use ($row) {
                $carry = $carry || (($row['NAME'] == $item['NAME']) && $row['PRICE'] == $item['PRICE']);
                return $carry;
            }, 0);           

            if($inArray)
            {
                $index = 0;
                foreach($data as $item)
                {
                    if((($row['NAME'] == $item['NAME']) && $row['PRICE'] == $item['PRICE']))
                        break;

                    $index++;
                }

                $data[$index]['CATEGORY'] .= ", ". $row['CATEGORY'];
            }
            else
            {
                $data[] = $row;
            }
        }

        foreach($data as $item)
        {
            echo "<div class=\"list__item\"> <div>Название: " . $item['NAME'] . "</div> <div>Категория: " . $item['CATEGORY'] . "</div> <div>Цена: ".$item['PRICE'] . " BYN</div></div>";
        }
    }
}

echo "</div>";
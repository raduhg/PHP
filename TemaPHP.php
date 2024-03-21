<!DOCTYPE html>
<html lang="en">
<head>
    <title>Functions for PHP arrays </title>
</head>
<body>
    <h1 style="text-align: center;">Functions used on arrays</h1>
    <?php
        $numbers=[
            "odd" => [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29],
            "even" => [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26 ,28, 30],
            "prime" => [2, 3, 5, 7, 11, 13, 17, 19, 23, 29],
            "square" => [1, 4, 9, 16, 25]
        ];

        $animals=[
            "feline" => "tiger",
            "canine" => "wolf",
            "reptile" => "crocodile",
            "fish" => "shark",
            "bird" => "parrot",
            "tree" => "oak"
        ];

        //count()
       echo "<h3>Example of an associative array, use of count():</h3>";
       echo "<p style='padding: 0 0 0 1rem;'><b> Used numbers: </b></p>";

        foreach($numbers as $key => $value)
        {
            echo "<p style='padding: 0 0 0 1rem;'><b> $key: </b>";
            for($iterator=0; $iterator < count($value); $iterator++)
            {
                echo "$value[$iterator]";
                echo ($iterator < count($value)-1) ? ", " : " "; //Used to insert a comma only in between numbers, but not after the last one
            }
            echo "</p>";
        }

        //array_merge()
        echo "<h3>Use of array_merge() and shuffle():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> All numbers, no matter the type, in no specific order: </b></p>";

        $merged_numbers = array_merge($numbers["odd"], $numbers["even"], $numbers["prime"], $numbers["square"] );
       shuffle($merged_numbers);

        echo "<p style='padding: 0 0 0 1rem;'>";
        for($iterator=0; $iterator<count($merged_numbers); $iterator++)
        {
	        echo "$merged_numbers[$iterator]";
            echo ($iterator < count($merged_numbers)-1) ? ", " : " ";
        }
        echo "</p>";

        //sort()
        echo "<h3>Use of sort():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> All numbers sorted: </b></p>";

        sort($merged_numbers);

        echo "<p style='padding: 0 0 0 1rem;'>";
        for($iterator=0; $iterator < count($merged_numbers); $iterator++)
        {
	        echo "$merged_numbers[$iterator]";
            echo ($iterator < count($merged_numbers)-1) ? ", " : " ";
        }
         echo"</p>";

        //array_unique()
        echo "<h3>Use of array_unique():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> All numbers sorted and without duplicates: </b></p>";

        $merged_unique_numbers = array_unique($merged_numbers);

        echo "<p style='padding: 0 0 0 1rem;'>";
        echo implode(", ", $merged_unique_numbers); 
        echo"</p>";

         //array_reverse
         echo "<h3>Use of array_reverse():</h3>";
         echo "<p style='padding: 0 0 0 1rem;'><b> All numbers sorted in descending order: </b></p>";

         $numbers_descending = array_reverse($merged_unique_numbers);

         echo "<p style='padding: 0 0 0 1rem;'>";
         echo implode(", ", $numbers_descending); 
         echo "</p>";

         //array_diff(), array_splice() and implode()
         echo "<h3>Use of array_diff(), array_splice() and implode():</h3>";
         echo "<p style='padding: 0 0 0 1rem;'><b> All numbers without the prime ones: </b></p>";

        $no_prime = array_diff($merged_unique_numbers, $numbers["prime"]);
        $no_prime = array_filter($no_prime, function($value) {
            return $value !== NULL && $value !== FALSE && $value !== "";
        });

        echo "<p style='padding: 0 0 0 1rem;'>";
        echo implode(", ", $no_prime); // Achives the same thing as the one-line if used earlier
        echo "</p>";

        //array_intersect()
        echo "<h3>Use of array_intersect():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> All the numbers that are both odd and prime: </b></p>";

        $odd_prime=array_intersect($numbers["odd"], $numbers["prime"]);

        echo "<p style='padding: 0 0 0 1rem;'>";
        echo implode(", ", $odd_prime); 
        echo "</p>";


        echo "<h3>Another example of an associative array:</h3>";
        foreach($animals as $key => $value)
        {
            echo "<p style='padding: 0 0 0 1rem;'><b> $key: </b>";  
            echo "$value";
            echo "</p>";
        }

        //key case
        echo "<h3>Use of array_change_key_case():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> Keys are uppercase </b></p>";

        foreach(array_change_key_case($animals, CASE_UPPER) as $key => $value)
        {
            echo "<p style='padding: 0 0 0 1rem;'><b> $key: </b>";  
            echo "$value";
            echo "</p>";
        }

        //flipped keys
        echo "<h3>Use of array_flip():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> Keys and values are swapped</b></p>";
        $flippedKeys = array_flip($animals);
        foreach($flippedKeys as $key => $value)
        {
            echo "<p style='padding: 0 0 0 1rem;'><b> $key: </b>";  
            echo "$value";
            echo "</p>";
        }
        
        //array_keys() + count
        echo "<h3>Use of array_keys():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> The number of keys in the animals array</b></p>";
        echo "<p style='padding: 0 0 0 1rem;'>";
        echo count(array_keys($animals));
        echo "</p>";

        //key, end & reset
        echo "<h3>Use of key(), end() and reset():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> The internal pointer is currently set to the first element</b></p>";
        echo "<p style='padding: 0 0 0 1rem;'>";
        echo 'key($animals) returns: '.key($animals);
        echo "</p>";
        end($animals);
        echo "<p style='padding: 0 0 0 1rem;'><b> end() will set the internal pointer to tha last element</b></p>";
        echo "<p style='padding: 0 0 0 1rem;'>";
        echo 'key($animals) returns: '.key($animals);
        echo "</p>";
        reset($animals);
        echo "<p style='padding: 0 0 0 1rem;'><b> reset() will set the internal pointer back to the first element</b></p>";
        echo "<p style='padding: 0 0 0 1rem;'>";
        echo 'key($animals) returns: '.key($animals);
        echo "</p>";

        //ksort() & krsort()
        echo "<h3>Use of ksort() and krsort():</h3>";
        echo "<p style='padding: 0 0 0 1rem;'><b> ksort() will sort the array by the keys in acsending order</b></p>";
        ksort($animals);
        foreach($animals as $key => $value)
        {
            echo "<p style='padding: 0 0 0 1rem;'><b> $key: </b>";  
            echo "$value";
            echo "</p>";
        }

        echo "<p style='padding: 0 0 0 1rem;'><b> krsort() will sort the array by the keys in descending order</b></p>";
        krsort($animals);
        foreach($animals as $key => $value)
        {
            echo "<p style='padding: 0 0 0 1rem;'><b> $key: </b>";  
            echo "$value";
            echo "</p>";
        }
    ?>
</body>

</html>

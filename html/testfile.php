<!DOCTYPE html>
<html>
    <head>
        <title>PHPTESTFILE</title>
    </head>
    <body>

        <?php include "../includes/header.php";
            require_once 'dbinfo.php';
            include_once "controller/Controller.php";
        ?>
        

        <?php
        // call controller method from class

        $controller = new Controller();
        $controller->invoke();







        $first_name = strip_tags(trim($_POST['first_name'])); // get posted data and remove whitespace
        $last_name = strip_tags(trim($_POST['last_name']));
        $date_of_birth = strip_tags(trim($_POST['date_of_birth']));
        $email = strip_tags(trim($_POST['email']));
        $pass = strip_tags(trim($_POST['password']));



        if (isset($_POST['first_name'])) {
            if ($_POST['last_name'] != '' && $_POST['password']) {
                $pass_char_count = strlen($pass);
                if ($pass_char_count < 3){
                    echo "enter more than 3 chars for pass";
                }
                else {
                    $_SESSION['startsess'] = $last_name;
                    // header("Location: nextp.html");
                }
            }
        }






        echo "<h1> Hello PHP </h1>";
        echo 'Name: ' . $first_name;
        echo 'Last Name: ' . $last_name;
        echo date('S');

        // turnary operator.... or however it's spelt
        $maxinteger = (15>10)?7:45;
        echo "<h1>" . $maxinteger . "</h1>";


        // php switch function
        switch($maxinteger){
            case 23:
            echo "Number 23";
            break;

            case 45:
            echo "Number45";
            break;

            default:
            echo "default";
        }


        //looping through arrays
        $arraylist = array('arr1', 'arr2', 'arr3');
        echo "<br>" . $arraylist[1];
        

        foreach($arraylist as $array){
            echo $array;
        }


        // kEY-VALUE pair arrays
        // Concatenating arrays    array1 + array2
        $student = array('Name' =>$name, 'Last Name' => $name2);
        foreach($student as $key => $value){
            echo $key . ':' . $value . "</br>";
        }



        //Multidim arrays
        $student = array(array('1','2','3'),
                        array(),
                        array());

        //for ($row = 0;);

        printf("Number is %s", $maxinteger);


        //String Comparisons
        $str1 = "ba";
        $str2 = "bn";

        echo "<br>";

        echo strcmp($str1, $str2);


        ?>
        <div>
            
        </div>


    </body>
</html>
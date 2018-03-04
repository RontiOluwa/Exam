<?php
        function insertexam($type,$name,$course)
        {
            include'db.php';                
            if($type === "Test")
            {
                $sql = "INSERT INTO test(test_name, test_course)VALUES('$name','$course')";
                if ($connect->query($sql) === TRUE) {
                    $last_id = $connect->insert_id;
                    echo $last_id;
                } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $connect->error;
                }
            }
            else 
            {
                $sql = "INSERT INTO exam(exam_name, exam_course)VALUES('$name','$course')";
                if ($connect->query($sql) === TRUE) {
                    $last_id = $connect->insert_id;
                    echo $last_id;
                } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $connect->error;
                }
            }
        }

        function insertquestion($question,$option1,$option2,$option3,$option4,$answer,$ids)
        {
            include'db.php';       

            // $options = array($option1, $option2, $option3, $option4);

            // $choices = json_encode($options);

            $query = mysqli_query($connect, "INSERT INTO questions(questions,source_id,choices,choice2,choice3,choice4,answer)VALUES
            ('$question','$ids','$option1','$option2','$option3','$option4','$answer')");
            if ($query) 
            {
                echo "Just added a question add  another if not ok";
            }   
            else
            {
                echo"Could Not Add Assessment";
            }
            echo $ids;
        }

?>
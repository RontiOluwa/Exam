<?php
    function retriveassessment()
    {
        include 'db.php';

// 	$sql1="SELECT * FROM test";
// 	$result1=mysqli_query($connect ,$sql1);
// 	if($result1)
// 	{
// 	while($row1=mysqli_fetch_array($result1))
// 	{
// 	$flag[]=$row1;
// 	}
// 	print(json_encode($flag));
// 	}
	
// mysqli_close($connect);

		$query = ("SELECT * FROM test");
		$result = mysqli_query($connect, $query);
		while ($row = mysqli_fetch_array($result)) 
		{
			echo'
			<h4>'.$row['test_name'].'</h4>
			<a href="questions.php?id='.$row['id'].'"><button data-id='.$row['id'].' id="getid">'.$row['test_course'].'</button></a>';
		}

    }
    retriveassessment();
?>
<?php
      function course()
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

		$query = ("SELECT * FROM courses");
		$result = mysqli_query($connect, $query);
		echo'<option></option>';        
		while ($row = mysqli_fetch_array($result)) 
		{
			echo'<option>'.$row["name"].'</option>';
			}

    }
    course();
?>
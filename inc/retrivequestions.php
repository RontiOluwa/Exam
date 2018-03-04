<?php
    include 'db.php';
    // $id = mysqli_real_escape_string($connect, $_POST['ids']);

	$id = $_GET["id"];

    function retrivequestions($id)
    {
        include 'db.php';

	$sql1="SELECT questions,choices,choice2,choice3,choice4,answer FROM questions where source_id = $id";
	$result1=mysqli_query($connect ,$sql1);
	if($result1)
	{
	    while($row1=mysqli_fetch_array($result1))
	{
	    $flag[]=$row1;
	}
	    print(json_encode($flag));
	}
	
    mysqli_close($connect);
    }
    retrivequestions($id);
?>
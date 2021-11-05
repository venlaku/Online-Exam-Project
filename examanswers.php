<?PHP
require 'dbHandler.php';

$voteMessage = "";
session_start();
if ((isset($_SESSION['hasVoted']))) {
	if ($_SESSION['hasVoted'] = '1') {
		$voteMessage = "You've already voted";
	}
}
else {
	if (isset($_GET['Submit1']) && isset($_GET['q'])) {
		$selected_radio = $_GET['q'];
		$idNumber = $_GET['h1'];

		$database = "survey";
		$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );
		if ($db_found) {
			if($selected_radio == "A") {
				$votedSQL = "UPDATE tblexam SET VotedA = VotedA + 1 WHERE ID = ?";
				$voteMessage = insert_vote($db_found, $votedSQL, $idNumber);
			}
			else if($selected_radio == "B"){
				$votedSQL = "UPDATE tblexam SET VotedB = VotedB + 1 WHERE ID = ?";
				$voteMessage = insert_vote($db_found, $votedSQL, $idNumber);
			}
			else if($selected_radio == "C"){
				$votedSQL = "UPDATE tblexam SET VotedC = VotedC + 1 WHERE ID = ?";
				$voteMessage = insert_vote($db_found, $votedSQL, $idNumber);
			}
			else {
				print "Error - could not record vote";
			}	
		}
	}
	else {
		print "You didn't select a voting option!";
	}
}

function insert_vote($db, $sql, $id) {

	$stmt = $db->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();

	//$_SESSION['hasVoted'] = '1';
	return "Thanks for voting!";
}
?>

<html>
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
<title>Process Survey</title>
</head>
<header>
    <h1>Online Exam</h1>
    <nav class="navbar sticky-top navbar-expand-lg">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        <a class="nav-link active" href="signup.php">Student Sign Up </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">LogOut</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="teacherlogin.php">Teacher LogIn</a>
        </li>
        </ul>
    </nav>
</header>
<body>
<?PHP print $voteMessage . "<BR>"; ?>
</body>
</html>
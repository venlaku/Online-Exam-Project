<?PHP
require 'dbHandler.php';
	if (isset($_GET['h1'])) {
		$qID = $_GET['h1'];
	} else {
		$qID = 1;
	}
	$question = 'Question not set';
	$answerA = 'unchecked';
	$answerB = 'unchecked';
	$answerC = 'unchecked';
	$A = "";
	$B = "";
	$C = "";
	$database = "online_exam";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );
	if ($db_found) {
		$stmt = $db_found->prepare("SELECT ID, Question, OptionA, OptionB, OptionC FROM tblexam WHERE ID = ?");
		if ($stmt) {
			$stmt->bind_param('i', $qID);
			$stmt->execute();
			$res = $stmt->get_result();
			if ($res->num_rows > 0) {
				$row = $res->fetch_assoc();
				$qID = $row['ID'];
				$question = $row['Question'];
				$A = $row['OptionA'];
				$B = $row['OptionB'];
				$C = $row['OptionC'];
			}
			else {
				print "Error - No rows";
			}
		}
		else {
			print "Error - DB ERROR";
		}
	}
	else {
		print "Error getting Survey";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Online Exam</title>
</head>
<body>
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
    <div class= "boxtwo">
        <form method="post">
            
        </form>
    </div>
    <footer>
        <p>© Venla Kuosmanen </p>
    </footer>
</body>
</html>

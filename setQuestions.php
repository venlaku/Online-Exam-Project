<?PHP
require 'dbHandler.php';
	$qID = '';
	$dropdown = '';
	$startSelect = "<SELECT NAME=drop1>";
	$endSelect = "</SELECT>";
	$wholeHTML = "";
	$getDropdownID = "";
	$hidTag = "";

	if (isset($_GET['Submit1'])) {
		$getDropdownID = $_GET['drop1'];
		header ("Location: exam.php?h1=" . $getDropdownID);
	}

	$database = "online_exam";


	if ($conn) {

		$stmt = $conn->prepare("SELECT ID, Question FROM tblexam");

		if ($stmt) {
			$stmt->execute();
			$res = $stmt->get_result();

			if ($res->num_rows > 0) {
				while ( $row = $res->fetch_assoc() ) {
					$qID = $row['ID'];
					$question = $row['Question'];
					$dropdown = $dropdown . "<OPTION VALUE='" . $qID . "'>" . $question . "</OPTION>" . "<BR>";
				}

				$wholeHTML = $startSelect . $dropdown . $endSelect;
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
		print "Error getting Exam";
	}
?>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Set an Exam Question</title>
</head>

<body>

<header>
    <h1>Online Exam</h1>
    <nav class="navbar sticky-top navbar-expand-lg">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        <a class="nav-link active" href="setQuestions.php">Set Exam Questions </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="checkStudentAnswer.php">Students Answers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">LogOut</a>
        </li>
        </ul>
    </nav>
</header>
<div class= "boxtwo">
<FORM NAME ="form1" METHOD ="GET" ACTION ="setQestions.php">
	<?PHP print $wholeHTML; ?>
	<P><INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Set a Question"></P>
</FORM>
</div>
<footer>
        <p>© Venla Kuosmanen </p>
    </footer>

</body>
</html>
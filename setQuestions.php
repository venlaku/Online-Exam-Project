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
	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {

		$stmt = $db_found->prepare("SELECT ID, Question FROM tblexam");

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
<FORM NAME ="form1" METHOD ="GET" ACTION ="setQestions.php">
	<?PHP print $wholeHTML; ?>
	<P><INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Set a Question"></P>
</FORM>
<footer>
        <p>© Venla Kuosmanen </p>
    </footer>

</body>
</html>
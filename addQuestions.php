<?PHP
require 'dbHandler.php';

if (isset($_GET['Sub1'])) {

	$question = $_GET['question'];
	$answerA = $_GET['AnswerA'];
	$answerB = $_GET['AnswerB'];
	$answerC = $_GET['AnswerC'];

	$database = "online_exam";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {
		$SQL = "INSERT INTO tblexam (Question, OptionA, OptionB, OptionC) VALUES (?,?,?,?)";
		$stmt = $db_found->prepare($SQL);
		if ($stmt) {
			$stmt->bind_param('ssss', $question, $answerA, $answerB, $answerC);
			$stmt->execute();

			print "The question has been added to the database";
		} else {
			print "Database - error";
		}
	}
	else {
		print "Database NOT Found ";
	}
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Teacher Page</title>
</head>
<body>

<FORM NAME ="form1" METHOD ="GET" ACTION ="setQuestion.php">
	Enter a question: <INPUT TYPE = 'TEXT' Name ='question'  value="What is the Question?"  maxlength="40">
<p>
	Answer A: <INPUT TYPE = 'TEXT' Name ='AnswerA'  value="Option A" maxlength="20">
	Answer B: <INPUT TYPE = 'TEXT' Name ='AnswerB'  value="Option B" maxlength="20">
	Answer C: <INPUT TYPE = 'TEXT' Name ='AnswerC'  value="Option C" maxlength="20">
<P align = center>
	<INPUT TYPE = "Submit" Name = "Sub1"  VALUE = "Set this Question">
</P>
</FORM>
<footer>
        <p>© Venla Kuosmanen </p>
    </footer>
</body>
</html>
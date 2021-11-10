<?PHP
require 'dbHandler.php';

if (isset($_GET['Sub1'])) {

	$question = $_GET['question'];
	$answerA = $_GET['AnswerA'];
	$answerB = $_GET['AnswerB'];
	$answerC = $_GET['AnswerC'];
    $correct = $_GET['Correct'];

	$database = "online_exam";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {
		$SQL = "INSERT INTO tblexam (Question, OptionA, OptionB, OptionC, Correct) VALUES (?,?,?,?,?)";
		$stmt = $db_found->prepare($SQL);
		if ($stmt) {
			$stmt->bind_param('ssss', $question, $answerA, $answerB, $answerC, $correct);
			$stmt->execute();

			print "The question has been added";
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
<header>
    <h1>Online Exam</h1>
    <nav class="navbar sticky-top navbar-expand-lg">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="teacherIndex.php">Home </a>
        </li>
        <li class="nav-item active">
        <a class="nav-link active" href="addQuestions.php">Add Exam Questions </a>
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
<FORM NAME ="form1" METHOD ="GET" ACTION ="setQuestion.php">
	Enter a question: <INPUT TYPE = 'TEXT' Name ='question'  placeholder="What is the Question?"  maxlength="40">
<p>
	Option A: <INPUT TYPE = 'TEXT' Name ='AnswerA'  placeholder="Option A" maxlength="20">
	Option B: <INPUT TYPE = 'TEXT' Name ='AnswerB'  placeholder="Option B" maxlength="20">
	Option C: <INPUT TYPE = 'TEXT' Name ='AnswerC'  placeholder="Option C" maxlength="20">
    <br>
    Correct Answer: <select id= 'correct-answer' name="correctAnswer">
        <option Name='A'>Option A</option>
        <option Name='B'>Option B</option>
        <option Name='C'>Option C</option>
    </select>
<P align = center>
	<INPUT type = "Submit" Name = "Sub1"  value = "Add Question">
</P>
</FORM>

<?php 
    if(isset($_POST['submit']))
    {
        //Get all values from the forms
        $question=$obj->sanitize($conn,$_POST['question']);
        $first_answer=$obj->sanitize($conn,$_POST['first_answer']);
        $second_answer=$obj->sanitize($conn,$_POST['second_answer']);
        $third_answer=$obj->sanitize($conn,$_POST['third_answer']);
        $fourth_answer=$obj->sanitize($conn,$_POST['fourth_answer']);
        $fifth_answer=$obj->sanitize($conn,$_POST['fifth_answer']);
        
        if(isset($_POST['is_active']))
        {
            $is_active=$_POST['is_active'];
        }
        else
        {
            $is_active='yes';
        }
        $answer=$obj->sanitize($conn,$_POST['answer']);
        $reason=$obj->sanitize($conn,$_POST['reason']);
        $marks=$obj->sanitize($conn,$_POST['marks']);
        $category=$obj->sanitize($conn,$_POST['category']);
        $added_date=date('Y-m-d');
        
        $tbl_name='tbl_question';
        $data="question='$question',
                first_answer='$first_answer',
                second_answer='$second_answer',
                third_answer='$third_answer',
                fourth_answer='$fourth_answer',
                fifth_answer='$fifth_answer',
                answer='$answer',
                reason='$reason',
                marks='$marks',
                is_active='$is_active',
                added_date='$added_date',
                updated_date=''
                ";
        $query=$obj->insert_data($tbl_name,$data);
        $res=$obj->execute_query($conn,$query);
        if($res===true)
        {
            $_SESSION['add']="<div class='success'>Question successfully added.</div>";
            header('location:'.SITEURL.'admin/index.php?page=questions');
        }
        else
        {
            $_SESSION['add']="<div class='error'>Failed to add question. Try again.</div>";
            header('location:'.SITEURL.'admin/index.php?page=add_question');
        }
    }
?>

</div>
<footer>
        <p>© Venla Kuosmanen </p>
        <p>Logged in as <?php echo $teacher_data['teacher_name']?></p>
    </footer>
</body>
</html>
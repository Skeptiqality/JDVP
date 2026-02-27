<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ | Tanks</title>
    <link rel="icon" type="image/x-icon" href="pics/logos/tank.jpg">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        
        <section class="quiz-container">
            <div class="quiz-score">

            </div>

            <?php
            $conn = new mysqli("localhost", "root", "", "quiz_game");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM tank_quiz ORDER BY RAND()";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $tank_name = $result->fetch_assoc();
                $answers = array(
                    $tank_name['choice1'],
                    $tank_name['choice2'],
                    $tank_name['choice3'],
                    $tank_name['choice4']
                );

                shuffle($answers);
                echo "<script>
                      const correctAnswer = '" . addslashes($tank_name['answer']) . "';
                      const shuffledAnswers = " . json_encode($answers) . ";
                      </script>";
            ?>

            <div class="quiz">
                <div class="quiz-questions">
                    <img src="<?php echo $tank_name['question_img']; ?>" alt="Question img">
                </div>
                
                <div class="feedback" id="feedback">Question #</div>

                <div class="quiz-choices">
                    <?php
                    foreach ($answers as $answer) {
                        echo '<button class="choices-btn" data-answer="' . $answer . '">' . $answer . '</button>';
                    }
                    ?>
                </div>

                <button class="next-btn" id="nextBtn">Next Question</button>

            </div>

            <?php
            } else {
                echo "No questions found.";
            }

            $conn->close();
            ?>
        </section>
    </main>
</body>

<script>
    let answered = false;

    document.querySelectorAll('.quiz-choices button').forEach(button => {
        button.addEventListener('click', function() {
            if (answered) return;

            answered = true;
            const selectedAnswer = this.getAttribute('data-answer');
            const feedbackElement = document.getElementById('feedback');
            const nextBtn = document.getElementById('nextBtn');

            if (selectedAnswer === correctAnswer) {
                this.classList.add('correct');
                feedbackElement.textContent = 'Correct! Well done!';
                feedbackElement.classList.add('show', 'success');
            } else {
                this.classList.add('incorrect');
                feedbackElement.textContent = 'Incorrect! The correct answer is: ' + correctAnswer;
                feedbackElement.classList.add('show', 'error');

                document.querySelectorAll('.quiz-choices button').forEach(btn => {
                    if (btn.getAttribute('data-answer') === correctAnswer) {
                        btn.classList.add('correct');
                    }
                });
            }

            document.querySelectorAll('.quiz-choices button').forEach(btn => {
                btn.disabled = true;
            });

            nextBtn.classList.add('show');
        });
    });

    document.getElementById('nextBtn').addEventListener('click', function() {
        location.reload();
    });
</script>

</html>
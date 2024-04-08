
<?php
/*
Plugin Name: guruquiz
Description: A custom quiz plugin with per-question timer feature.
Version: 1.0
Author: Naija Guru 
*/
function custom_quiz_shortcode()
{
     ob_start();
    ?>
        <div class="custom-quiz-container">
             <h2>Welcome to Guru Quiz!</h2>
            <form id="custom-quiz-form" method="post" >
                 <input type="hidden" name="action" value="custom_quiz_process_submission">
                <div class="quiz-question">
                    <p>What is the capital of France?</p>
                    <input type="radio" name="answer" value="Paris"> Paris<br>
                    <input type="radio" name="answer" value="London"> London<br>
                    <input type="radio" name="answer" value="Berlin"> Berlin<br>
                    <input type="radio" name="answer" value="Rome"> Rome<br>
                </div>
                <!-- Add more questions here -->
                <input type="submit" value="Submit">
            </form>
            <div id="quiz-score"></div>
        </div>
        <?php
        return ob_get_clean();
}
// Register shortcode
add_shortcode('custom_quiz', 'custom_quiz_shortcode');
function custom_quiz_enqueue_scripts()
{
     wp_enqueue_script('custom-quiz-script', plugins_url('/js/custom-quiz-script.js', __FILE__), array('jquery'), '1.0', true);
    
     wp_enqueue_style('custom-quiz-style', plugins_url('/css/custom-quiz-style.css', __FILE__), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'custom_quiz_enqueue_scripts');

 $quizQuestions = [
    [
        "question" => "What is the capital of France?",
        "options" => ["Paris", "London", "Berlin", "Rome"],
        "correctAnswer" => "Paris"
    ],
    [
        "question" => "Which planet is known as the Red Planet?",
        "options" => ["Venus", "Mars", "Jupiter", "Saturn"],
        "correctAnswer" => "Mars"
    ],
 ];

// Function to calculate score
function custom_quiz_calculate_score($answers)
{
    $score = 0;
    foreach ($answers as $index => $selectedAnswer) {
        global $quizQuestions;
        if ($selectedAnswer === $quizQuestions[$index]["correctAnswer"]) {
            $score++;
        }
    }
    return $score;
}

//   quiz submission
function custom_quiz_process_submission()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["answers"])) {
         session_start();
        $_SESSION["quiz_answers"] = $_POST["answers"];

         $score = custom_quiz_calculate_score($_SESSION["quiz_answers"]);

         echo "Your score: " . $score;

         exit;
    }
}
add_action('init', 'custom_quiz_process_submission');

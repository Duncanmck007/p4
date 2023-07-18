<?php
session_start();

if (!isset($_SESSION["randNum"])) {
    $_SESSION["randNum"] = rand(1, 10);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userGuess = $_POST["num"];
    $randNum = $_SESSION["randNum"];

    if ($randNum == $userGuess) {
        $_SESSION["message"] = "Correct! The number was $randNum.";
        $_SESSION["randNum"] = rand(1, 10);  // Generate a new number for the next round.
    } else if ($userGuess > $randNum) {
        $_SESSION["message"] = "Too high! Try again.";
    } else {
        $_SESSION["message"] = "Too low! Try again.";
    }

    header("Location: ".$_SERVER["PHP_SELF"]);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Duncan McKinley's Portal" />
    <meta name="author" content="Duncan Mckinley" />
    <title>Duncan McKinley's Portal</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<header class="banner">
    <div class="fau-logo"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">Duncan McKinley's Portal</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('profile')">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('assignments')">Assignments</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('projects')">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('quiz')">Quiz</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#" onclick="showSection('game')">Guessing Game</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <section id="profile" class="section" style="display: none;">
        <h2>My Profile</h2>
        <div class="row">
            <div class="col-12">
                <p>Hello! I'm Duncan McKinley, an aspiring Computer Science major with a passion for programming. Ever since I was introduced to the world of coding, I've been captivated by its endless possibilities and the creative problem-solving it entails. I am committed to honing my skills and becoming a proficient programmer.</p>
                <p>When I'm not immersed in code, I love spending my free time playing disc golf. I find it to be a perfect combination of relaxation, strategic thinking, and a bit of exercise. It's also an excellent way to clear my mind and think through complex coding challenges.</p>
                <p>Apart from disc golf, my other loves include my beautiful wife, Lauren, and my loyal dog, Millie. They're my support system, and their belief in me keeps me motivated on this exciting journey.</p>
                <p>I am eager to learn, enthusiastic about taking on new projects, and look forward to making a significant impact in the field of computer science. Welcome to my portal, a complete project management solution where I showcase my work and track my progress.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <img id="profile-image" src="assets/discGolf.jpeg" alt="Disc Golf" />
            </div>
        </div>
    </section>
    <section id="assignments" class="section" style="display: none;">
        <h2>Assignments</h2>
        <ol>
            <li><a class="preview-link" href="https://canvas.fau.edu/courses/140017/assignments/1639899/submissions/460330" target="_blank">Syllabus Quiz</a>
                <span class="preview"><img src="assets/syllabusQuiz.JPG" alt="Syllabus Quiz"></span></li>
            <li><a class="preview-link" href="https://learn.zybooks.com/zybook/FAUCOP3813MarquesSummer2023" target="_blank">Zbooks Assignements</a>
                <span class="preview"><img src="assets/zbooks.JPG" alt="Zbooks Assignements"></span></li>
        </ol>
    </section>
    <section id="projects" class="section" style="display: none;">
        <h2>Projects</h2>
        <ol>
            <li><a class="preview-link" href="https://www.laurmanart.com" target="_blank">Project 1: Web page using “no code” tools</a>
                <span class="preview"><img src="assets/laurmanart.JPG" alt="no code"></span></li>
        </ol>
    </section>
    <section id="quiz" class="section" style="display: none;">
        <h2>Which Pet Should You Adopt?</h2>
        <form id="quiz-form">
            <div class="quiz-question">
                <p>Question 1: How much free time do you have each day for a pet?</p>
                <input type="radio" id="q1a1" name="q1" value="dog">
                <label for="q1a1">I have a lot of free time each day.</label><br>
                <input type="radio" id="q1a2" name="q1" value="cat">
                <label for="q1a2">I have some free time each day.</label><br>
                <input type="radio" id="q1a3" name="q1" value="fish">
                <label for="q1a3">I have very little free time each day.</label>
            </div>
            <div class="quiz-question">
                <p>Question 2: How much space do you have in your home for a pet?</p>
                <input type="radio" id="q2a1" name="q2" value="dog">
                <label for="q2a1">I have a large house with a yard.</label><br>
                <input type="radio" id="q2a2" name="q2" value="cat">
                <label for="q2a2">I have a small house or apartment.</label><br>
                <input type="radio" id="q2a3" name="q2" value="fish">
                <label for="q2a3">I have very little space in my home.</label>
            </div>
            <div class="quiz-question">
                <p>Question 3: How much time can you dedicate to exercise a pet?</p>
                <input type="radio" id="q3a1" name="q3" value="dog">
                <label for="q3a1">I have plenty of time for walks and playtime.</label><br>
                <input type="radio" id="q3a2" name="q3" value="cat">
                <label for="q3a2">I can play with my pet occasionally, but not much time for walks.</label><br>
                <input type="radio" id="q3a3" name="q3" value="fish">
                <label for="q3a3">I really have no extra time for pet exercise.</label>
            </div>
            <div class="quiz-question">
                <p>Question 4: What level of maintenance are you looking for in a pet?</p>
                <input type="radio" id="q4a1" name="q4" value="dog">
                <label for="q4a1">I don't mind a high-maintenance pet.</label><br>
                <input type="radio" id="q4a2" name="q4" value="cat">
                <label for="q4a2">I prefer a pet with moderate maintenance.</label><br>
                <input type="radio" id="q4a3" name="q4" value="fish">
                <label for="q4a3">I'd like a pet with minimal maintenance requirements.</label>
            </div>
            <div class="quiz-question">
                <p>Question 5: How comfortable are you with noise in your home?</p>
                <input type="radio" id="q5a1" name="q5" value="dog">
                <label for="q5a1">I don't mind noise.</label><br>
                <input type="radio" id="q5a2" name="q5" value="cat">
                <label for="q5a2">I prefer some quiet.</label><br>
                <input type="radio" id="q5a3" name="q5" value="fish">
                <label for="q5a3">I prefer complete peace and quiet at all times.</label>
            </div>
            <button type="submit">Submit Quiz</button>
        </form>
        <div id="quiz-result"></div>
        <div id="quiz-image"></div>
    </section>
                <section id="game" class="section">
                    <h2>Guess a Random Number Game</h2>
                    <div class="row">
                        <div class="col-12">
                            <?php
                                if (isset($_SESSION["message"])) {
                                    echo "<p class='text-warning'>".$_SESSION["message"]."</p>";
                                    unset($_SESSION["message"]);
                                }
                            ?>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <p>I'm thinking of a number between 1 and 10.</p>
                                <div class="form-group">
                                    <label for="num">Your guess?</label>
                                    <input type="number" class="form-control" id="num" name="num" min="1" max="10" autofocus required>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-primary" value="Guess">
                                <input type="submit" class="btn btn-secondary" name="reset" value="Reset Game">
                            </form>
                        </div>
                    </div>
                </section>
            </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts.js"></script>
</body>
</html>
// this starts my javascript whenever the page is loaded
document.addEventListener("DOMContentLoaded", function(){
    console.log('Script loaded successfully'); //was having issues in the console so made a test to see if my script was even loading.
    var navItems = document.querySelectorAll('.nav-item');

    // function to show different sections on the page (this was a huge headache for me. If any part of this code was wrong, my whole website doesn't work.)
    window.showSection = function(id) {
        // all sections
        var sections = document.querySelectorAll('.section');
        // hide all sections
        sections.forEach(function(section) {
            section.style.display = 'none';
        });

        // make all nav items inactive so that user can choose one when user want to navigate to a certain tab
        navItems.forEach(function(navItem) {
            navItem.querySelector('.nav-link').classList.remove('active');
        });

        // make nav active when user clicks on the certain tab
        document.getElementById(id).style.display = 'block';
        document.querySelector(`[onclick="showSection('${id}')"]`).classList.add('active');
    }

    // get the quiz form and result display
    const quizForm = document.getElementById('quiz-form');
    const quizResult = document.getElementById('quiz-result');

    // when submit button clicked, it only is going to update the quiz and not the whole page
    quizForm.addEventListener('submit', function(event) {
        event.preventDefault();
        calculateResult();
    });

    // where I calculate what your quiz answer is.
    function calculateResult() {
        // needed a place to hold pet scores
        const results = {
            dog: 0,
            cat: 0,
            fish: 0
        };

        // the weights for the different questions. this was much needed as my quiz is very skewed without it. Some questions are more important than others.
        const weights = [3, 2, 3, 3, 1];

        // pull all the questions
        const questions = document.querySelectorAll('.quiz-question');

        // this is where we add the points to each variable for whatever answer you have chosen for each quiz question
        questions.forEach((question, index) => {
            const selectedOption = question.querySelector('input[type="radio"]:checked');
            if (selectedOption) {
                results[selectedOption.value] += weights[index];
            }
        });

        // going to assume dog is winner to clean up code.
        let finalResult = 'dog';
        let finalImage = 'assets/dog.jpg';
        // then we just check if the cat or fish has more points and if they do we use those results and images instead
        if (results.cat > results.dog && results.cat > results.fish) {
            finalResult = 'cat';
            finalImage = 'assets/cat.jpg';
        } else if (results.fish > results.dog && results.fish > results.cat) {
            finalResult = 'fish';
            finalImage = 'assets/fish.jpg';
        }

        // show the user the results.
        quizResult.textContent = `You should adopt a ${finalResult}!`;
        document.getElementById('quiz-image').innerHTML = `<img src="${finalImage}" alt="${finalResult} Image">`;
    }

    // this is to show my game page as a sort of homepage.
    showSection('game');
});





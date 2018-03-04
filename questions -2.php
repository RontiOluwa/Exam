<html>
    <head>
        <script src="assets/jquery.min.js"></script>        
        <style>
            body{
                    font-size: 20px;
                    font-family: sans-serif;
                    color: #333;
                }
                .question{
                    font-weight: 600;
                }
                .answers {
                    margin-bottom: 20px;
                }
                #submit{
                    font-family: sans-serif;
                    font-size: 20px;
                    background-color: #297;
                    color: #fff;
                    border: 0px;
                    border-radius: 3px;
                    padding: 20px;
                    cursor: pointer;
                    margin-bottom: 20px;
                }
                #submit:hover{
                    background-color: #3a8;
                }
        </style>

    </head>
    <body>
        <div id="quiz"></div>
        <button id="submit">Get Results</button>
        <div id="results"></div>
        <?php
       echo"<input class='id' value=".$_GET["id"]." style='display:none'>";
        ?>
    </body>

    <script>
                // url:"",  
                var ids = $('.id').val();
                var url = "inc/retrivequestions.php?id="+ids+"";
                var networkDataReceived = false;
                fetch(url)
                .then(function(res) {
                    return res.json();
                })
                .then(function(data) {
                    networkDataReceived = true;
                    console.log('From web', data);
                    function generateQuiz(questions, quizContainer, resultsContainer, submitButton){
                        function showQuestions(questions, quizContainer){
                        var output = [];
                            var answers;
                            // for each question...
                            for(var i=0; i<questions.length; i++){
                                
                                // first reset the list of answers
                                answers = [];

                                // for each available answer to this question...
                                // for(letter in questions[i].answers){

                                    // ...add an html radio button
                                    answers.push(
                                        '<label>'
                                            + '<input type="radio" name="question'+i+'" value="'+questions[i].choices+'">'
                                            + questions[i].choices
                                        + '</label>'
                                    );

                                     answers.push(
                                        '<label>'
                                            + '<input type="radio" name="question'+i+'" value="'+questions[i].choice2+'">'
                                            + questions[i].choice2
                                        + '</label>'
                                    );

                                     answers.push(
                                        '<label>'
                                            + '<input type="radio" name="question'+i+'" value="'+questions[i].choice3+'">'
                                            + questions[i].choice3
                                        + '</label>'
                                    );

                                     answers.push(
                                        '<label>'
                                            + '<input type="radio" name="question'+i+'" value="'+questions[i].choice4+'">'
                                            + questions[i].choice4
                                        + '</label>'
                                    );

                                // }

                                // add this question and its answers to the output
                                output.push(
                                    '<div class="question">' + questions[i].question + '</div>'
                                    + '<div class="answers">' + answers.join('') + '</div>'
                                );
                            }

                            // finally combine our output list into one string of html and put it on the page
                            quizContainer.innerHTML = output.join('');

                        }

                        function showResults(questions, quizContainer, resultsContainer){
                            // gather answer containers from our quiz
                            var answerContainers = quizContainer.querySelectorAll('.answers');
                            
                            // keep track of user's answers
                            var userAnswer = '';
                            var numCorrect = 0;
                            
                            // for each question...
                            for(var i=0; i<questions.length; i++){

                                // find selected answer
                                userAnswer = (answerContainers[i].querySelector('input[name=question'+i+']:checked')||{}).value;
                                
                                // if answer is correct
                                if(userAnswer===questions[i].answer){
                                    // add to the number of correct answers
                                    numCorrect++;
                                    
                                    // color the answers green
                                    answerContainers[i].style.color = 'lightgreen';
                                }
                                // if answer is wrong or blank
                                else{
                                    // color the answers red
                                    answerContainers[i].style.color = 'red';
                                }
                            }

                            // show number of correct answers out of total
                            resultsContainer.innerHTML = numCorrect + ' out of ' + questions.length;

                        }

                        // show the questions
                        showQuestions(questions, quizContainer);

                        // when user clicks submit, show results
                        submitButton.onclick = function(){
                            showResults(questions, quizContainer, resultsContainer);
                        }
                    }

                    var quizContainer = document.getElementById('quiz');
                    var resultsContainer = document.getElementById('results');
                    var submitButton = document.getElementById('submit');


                    generateQuiz(data, quizContainer, resultsContainer, submitButton);    
                });
    </script>

</html>
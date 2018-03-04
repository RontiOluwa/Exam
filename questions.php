<html>
    <head>
        <script src="assets/jquery.min.js"></script>        
        <style>
           body{
                font-family: sans-serif;
           }
            h1 {
            font-family:'Rokkitt', serif;
            text-align: center;
            }
            ul {
            list-style: none;
            }
            li {
            font-family:'Rokkitt', serif;
            font-size: 2em;
            }
            input[type=radio] {
            border: 0px;
            width: 20px;
            height: 2em;
            }
            p {
            font-family:'Rokkitt', serif;
            }
            /* Quiz Classes */
            .quizContainer {
            background-color: lightgoldenrodyellow;
            border-radius: 6px;
            width: 75%;
            margin: auto;
            padding-top: 5px;
            -moz-box-shadow: 10px 10px 5px #888;
            -webkit-box-shadow: 10px 10px 5px #888;
            box-shadow: 10px 10px 5px #888;
            position: relative;
            }
            .nextButton {
            box-shadow: 3px 3px 5px #888;
            border-radius: 6px;
            width: 150px;
            height: 40px;
            text-align: center;
            background-color: lightgrey;
            /*clear: both;*/
            color: red;
            font-family:'Rokkitt', serif;
            position: relative;
            margin: auto;
            padding-top: 20px;
            }
            .question {
            font-family:'Rokkitt', serif;
            font-size: 2em;
            width: 90%;
            height: auto;
            margin: auto;
            border-radius: 6px;
            background-color: lightgrey;
            text-align: center;
            }
            .quizMessage {
            background-color: peachpuff;
            border-radius: 6px;
            width: 30%;
            margin: auto;
            text-align: center;
            padding: 2px;
            font-family:'Rokkitt', serif;
            color: red;
            }
            .choiceList {
            font-family: Courier, serif;
            color: blueviolet;
            }
            .result {
            width: 30%;
            height: auto;
            border-radius: 6px;
            background-color: linen;
            margin: auto;
            text-align: center;
            font-family:'Rokkitt', serif;
            }
            /* End of Quiz Classes */
        </style>

    </head>
    <body>
        <?php
       echo"<input class='id' value=".$_GET["id"]." style='display:none'>";
        ?>
        <div class="quizContainer">
             <h1>Hello! Welcome to the JS Dynamic Quiz!</h1>
    
            <div class="question"></div>
            <ul class="choiceList"></ul>
            <div class="quizMessage"></div>
            <div class="result"></div>
            <div class="nextButton">Next Question</div>
            <br>
        </div>
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
                .then(function(questions) {
                    networkDataReceived = true;
                    console.log('From web', questions); 
                    
                    var currentQuestion = 0;
                    var correctAnswers = 0;
                    var quizOver = false;

                    $(document).ready(function () {

                        // Display the first question
                        displayCurrentQuestion();
                        $(this).find(".quizMessage").hide();

                        // On clicking next, display the next question
                        $(this).find(".nextButton").on("click", function () {
                            if (!quizOver) {

                                value = $("input[type='radio']:checked").val();

                                if (value == undefined) {
                                    $(document).find(".quizMessage").text("Please select an answer");
                                    $(document).find(".quizMessage").show();
                                } else {
                                    // TODO: Remove any message -> not sure if this is efficient to call this each time....
                                    $(document).find(".quizMessage").hide();

                                    if (value == questions[currentQuestion].answer) {
                                        correctAnswers++;
                                    }

                                    currentQuestion++; 
                                    // Since we have already displayed the first question on DOM ready
                                    if (currentQuestion < questions.length) {
                                        displayCurrentQuestion();
                                    } else {
                                        displayScore();
                                        //                    $(document).find(".nextButton").toggle();
                                        //                    $(document).find(".playAgainButton").toggle();
                                        // Change the text in the next button to ask if user wants to play again
                                        $(document).find(".nextButton").text("Play Again?");
                                        quizOver = true;
                                    }
                                }
                            } else { // quiz is over and clicked the next button (which now displays 'Play Again?'
                                quizOver = false;
                                $(document).find(".nextButton").text("Next Question");
                                resetQuiz();
                                displayCurrentQuestion();
                                hideScore();
                            }
                        });

                    });

                    // This displays the current question AND the choices
                    function displayCurrentQuestion() {

                        console.log("In display current Question");

                        var question = questions[currentQuestion].questions;
                        var questionClass = $(document).find(".quizContainer > .question");
                        var choiceList = $(document).find(".quizContainer > .choiceList");
                        var numChoices1 = questions[currentQuestion].choices;
                        var numChoices2 = questions[currentQuestion].choice2;
                        var numChoices3 = questions[currentQuestion].choice3;
                        var numChoices4 = questions[currentQuestion].choice4;

                        // Set the questionClass text to the current question
                        $(questionClass).text(question);

                        // Remove all current <li> elements (if any)
                        $(choiceList).find("li").remove();
                        $('<li><input type="radio" value=' + numChoices1 + ' name="dynradio" />' + numChoices1 + '</li>').appendTo(choiceList);
                        $('<li><input type="radio" value=' + numChoices2 + ' name="dynradio" />' + numChoices2 + '</li>').appendTo(choiceList);
                        $('<li><input type="radio" value=' + numChoices3 + ' name="dynradio" />' + numChoices3 + '</li>').appendTo(choiceList);
                        $('<li><input type="radio" value=' + numChoices4 + ' name="dynradio" />' + numChoices4 + '</li>').appendTo(choiceList);
                        // var choice;
                        // for (i = 0; i < numChoices; i++) {
                        //     choice = questions[currentQuestion].choices[i];
                        //     $('<li><input type="radio" value=' + i + ' name="dynradio" />' + choice + '</li>').appendTo(choiceList);
                        // }
                    }

                    function resetQuiz() {
                        currentQuestion = 0;
                        correctAnswers = 0;
                        hideScore();
                    }

                    function displayScore() {
                        $(document).find(".quizContainer > .result").text("You scored: " + correctAnswers + " out of: " + questions.length);
                        $(document).find(".quizContainer > .result").show();
                    }

                    function hideScore() {
                        $(document).find(".result").hide();
                    }  
                });
    </script>

</html>
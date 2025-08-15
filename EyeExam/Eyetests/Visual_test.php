<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Visual Acuity Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary-color: #b5985a;
            --secondary-color: #24262b;
            --accent-color: #ffdd92ff;
            --light-accent: #f8f1e0;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --box-shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.15);
            --border-radius: 12px;
            --dark-color: #24262b;
            --gray-color: #6c757d;
        }

        .upper_things {
            margin: 50px;
        }

        .container {
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--box-shadow);
            margin: 0 auto 30px;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        h1 {
            margin: 0 0 20px;
            color: var(--secondary-color);
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            text-align: center;
            font-family: big;
        }

        .disclaimer {
            background-color: var(--light-accent);
            color: var(--secondary-color);
            padding: 20px;
            border-radius: var(--border-radius);
            margin: 0 auto 40px;
            border-left: 5px solid var(--primary-color);
            max-width: 900px;
            text-align: center;
            font-size: 1.05rem;
            box-shadow: var(--box-shadow);
            font-family: small;
        }

        .test-section {
            display: none;
            margin: 0 auto 30px;
            text-align: center;
            width: 100%;
        }

        .test-section.active {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeIn 0.6s ease-out;
        }

        .question {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 25px 0 15px;
            color: var(--secondary-color);
            text-align: center;
            max-width: 600px;
            line-height: 1.5;
            font-family: medium;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            width: 100%;
            margin: 20px 0;
        }

        input[type="text"] {
            padding: 14px 20px;
            width: 250px;
            font-size: 1rem;
            border-radius: var(--border-radius);
            border: 2px solid #e0e0e0;
            background: #f9f9f9;
            transition: var(--transition);
            text-align: center;
            font-weight: 500;
            text-transform: uppercase;
        }

        input[type="text"]:focus {
            border-color: var(--primary-color);
            background: white;
            outline: none;
            box-shadow: 0 0 0 4px rgba(181, 152, 90, 0.2);
            transform: scale(1.02);
        }

        button {
            background-color: var(--primary-color);
            border: none;
            color: white;
            padding: 14px 30px;
            font-size: 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            letter-spacing: 0.5px;
            width: fit-content;
            margin: 10px auto;
            box-shadow: var(--box-shadow);
            font-family: medium;
        }

        button:hover:not(:disabled) {
            background-color: var(--secondary-color);
            transform: translateY(-3px) scale(1.02);
            box-shadow: var(--box-shadow-hover);
        }

        button:active:not(:disabled) {
            transform: translateY(1px);
        }

        button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
        }

        .result {
            margin: 25px auto;
            font-weight: 500;
            border-radius: var(--border-radius);
            padding: 18px 25px;
            display: none;
            max-width: 600px;
            width: 90%;
            text-align: center;
            font-size: 1rem;
            line-height: 1.6;
            font-family: small;
        }

        .correct {
            background-color: #e8f5e9;
            color: #2e7d32;
            border-left: 5px solid #4caf50;
        }

        .incorrect {
            background-color: #ffebee;
            color: #c62828;
            border-left: 5px solid #f44336;
        }

        #finalResults {
            display: none;
            background: white;
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--box-shadow);
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .progress-container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto 40px;
            text-align: center;
        }

        .progress-bar {
            height: 12px;
            width: 950px;
            background-color: #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
            margin: 10px auto;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .progress {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            width: 0%;
            transition: width 0.6s cubic-bezier(0.65, 0, 0.35, 1);
        }

        .progress-text {
            font-size: 0.9rem;
            color: var(--gray-color);
            font-weight: 500;
            margin-top: 5px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .test-title {
            color: var(--primary-color);
            margin: 0 0 25px;
            font-weight: 500;
            font-size: 1.8rem;
            position: relative;
            display: inline-block;
            text-align: center;
            padding-bottom: 10px;
            font-family: title_texte;
        }

        .test-title::after {
            content: '';
            position: absolute;
            width: 60%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            bottom: 0;
            left: 20%;
            border-radius: 2px;
        }

        .letter-display {
            font-family: 'Times New Roman', serif;
            font-weight: bold;
            color: var(--secondary-color);
            margin: 30px auto;
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: 8px solid white;
            transition: var(--transition);
            width: fit-content;
            max-width: 90%;
        }

        .go-back {
            display: inline-flex;
            align-items: center;
            color: var(--primary-color);
            text-decoration: none;
            margin-bottom: 20px;
            transition: var(--transition);
            font-weight: 500;
            font-family: big;
            position: relative;
        }

        .go-back i {
            margin-right: 8px;
            transition: var(--transition);
        }

        .go-back:hover {
            color: var(--secondary-color);
            transform: translateX(-3px);
        }

        .go-back:hover i {
            transform: translateX(-3px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 25px;
            }

            h1 {
                font-size: 2rem;
            }

            .test-title {
                font-size: 1.5rem;
            }

            .question {
                font-size: 1.1rem;
            }

            input[type="text"] {
                width: 80%;
            }

            .letter-display {
                padding: 20px;
            }
        }
    </style>


    <!--results-->
    <style>
        /* Final Results Styling */
        .results-container {
            display: none;
            background: white;
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--box-shadow);
            max-width: 900px;
            margin: 30px auto;
            text-align: center;
            animation: fadeIn 0.8s ease-out;
        }

        .results-summary {
            background-color: var(--light-accent);
            border-radius: var(--border-radius);
            padding: 30px;
            margin: 25px 0;
            text-align: center;
            box-shadow: var(--box-shadow);
        }

        .results-summary p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 20px;
            color: var(--secondary-color);
            font-family: small;
        }

        .results-summary h3 {
            color: var(--primary-color);
            margin: 25px 0 15px;
            font-size: 1.5rem;
            font-family: medium;
        }

        .results-summary ul {
            list-style: none;
            padding: 0;
            margin: 0 auto;
            max-width: 700px;
            font-family: small;
            text-align: left;
        }

        .results-summary li {
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            font-family: small;
        }

        .results-summary li:hover {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .results-summary li strong {
            color: var(--secondary-color);
            font-weight: 600;
            font-family: small;
        }

        .results-summary li p {
            font-size: 0.95rem;
            margin: 8px 0 0 25px;
            color: var(--gray-color);
            line-height: 1.5;
            font-family: small;
        }

        .retake-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 35px;
            font-size: 1.1rem;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 20px;
            font-weight: 600;
            box-shadow: var(--box-shadow);
            font-family: medium;
        }

        .retake-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: var(--box-shadow-hover);
        }

        /* Score message styling */
        .excellent-score {
            color: #2e7d32;
            font-weight: 600;
        }

        .good-score {
            color: #f57c00;
            font-weight: 600;
        }

        .fair-score {
            color: #d35400;
            font-weight: 600;
        }

        .poor-score {
            color: #c62828;
            font-weight: 600;
        }

        /* Animation for results */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</head>

<body>

    <!--Navigation Bar-->
    <header>
        <?php
        include("../../NavBar/navbar.php")
        ?>
    </header>
    <div class="upper_things">
        <a href="../eye_test.php" class="go-back">
            <i class="fas fa-arrow-left"></i>
            Go Back
        </a>
        <h1 class="title">Visual Acuity Test</h1>
        <div class="disclaimer">
            ⚠ This test should be taken at a standard testing distance (usually 6 feet/2 meters).
            Ensure proper lighting and stand at the correct distance from your screen.
        </div>

        <div class="progress-bar">
            <div class="progress" id="progressBar"></div>
        </div>
    </div>
    <div class="container">

        <!-- Test 1 (Largest letters) -->
        <div class="test-section active" id="test1">
            <h2 class="test-title">Level 1: 20/200 Vision</h2>
            <div class="letter-display" style="font-size: 100px;">E F P</div>
            <div class="question">What letters do you see? (Enter all letters with spaces)</div>
            <input type="text" id="answer1" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(1)">Submit Answer</button>
            <div class="result" id="result1"></div>
        </div>

        <!-- Test 2 -->
        <div class="test-section" id="test2">
            <h2 class="test-title">Level 2: 20/100 Vision</h2>
            <div class="letter-display" style="font-size: 70px;">T O Z</div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer2" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(2)">Submit Answer</button>
            <div class="result" id="result2"></div>
        </div>

        <!-- Test 3 -->
        <div class="test-section" id="test3">
            <h2 class="test-title">Level 3: 20/70 Vision</h2>
            <div class="letter-display" style="font-size: 60px;">L P E </div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer3" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(3)">Submit Answer</button>
            <div class="result" id="result3"></div>
        </div>

        <!-- Test 4 -->
        <div class="test-section" id="test4">
            <h2 class="test-title">Level 4: 20/50 Vision</h2>
            <div class="letter-display" style="font-size: 50px;">F E C O</div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer4" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(4)">Submit Answer</button>
            <div class="result" id="result4"></div>
        </div>

        <!-- Test 5 -->
        <div class="test-section" id="test5">
            <h2 class="test-title">Level 5: 20/40 Vision</h2>
            <div class="letter-display" style="font-size: 40px;">D E F P </div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer5" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(5)">Submit Answer</button>
            <div class="result" id="result5"></div>
        </div>

        <!-- Test 6 -->
        <div class="test-section" id="test6">
            <h2 class="test-title">Level 6: 20/30 Vision</h2>
            <div class="letter-display" style="font-size: 30px;">E F P </div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer6" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(6)">Submit Answer</button>
            <div class="result" id="result6"></div>
        </div>

        <!-- Test 7 -->
        <div class="test-section" id="test7">
            <h2 class="test-title">Level 7: 20/25 Vision</h2>
            <div class="letter-display" style="font-size: 20px;">D E F P O </div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer7" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(7)">Submit Answer</button>
            <div class="result" id="result7"></div>
        </div>

        <!-- Test 8 -->
        <div class="test-section" id="test8">
            <h2 class="test-title">Level 8: 20/20 Vision (Normal)</h2>
            <div class="letter-display" style="font-size: 15px;">F E D O P </div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer8" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(8)">Submit Answer</button>
            <div class="result" id="result8"></div>
        </div>

        <!-- Test 9 -->
        <div class="test-section" id="test9">
            <h2 class="test-title">Level 9: 20/15 Vision (Better than normal)</h2>
            <div class="letter-display" style="font-size: 8px;">E D F C T O</div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer9" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(9)">Submit Answer</button>
            <div class="result" id="result9"></div>
        </div>

        <!-- Test 10 -->
        <div class="test-section" id="test10">
            <h2 class="test-title">Level 10: 20/10 Vision (Exceptional)</h2>
            <div class="letter-display" style="font-size: 6px;">F E D O P C T E D</div>
            <div class="question">What letters do you see?</div>
            <input type="text" id="answer10" placeholder="Enter letters" autocomplete="off" />
            <button onclick="checkAnswer(10)">Submit Answer</button>
            <div class="result" id="result10"></div>
        </div>

        <!-- Final Results -->
        <div id="finalResults" class="results-container">
            <h2 class="test-title">Your Visual Acuity Results</h2>
            <div id="resultsSummary" class="results-summary"></div>
            <button class="retake-btn" onclick="location.reload()">Take Test Again</button>
        </div>
    </div>

    <!--Footer section-->
    <footer>
        <?php
        include("../../Footer/footer_css.html");
        ?>
    </footer>

</body>

<script>
    const totalTests = 10;
    let currentTest = 1;
    const testScores = [];

    // Correct answers for each test
    const correctAnswers = [
        "EFP", // Level 1
        "TOZ", // Level 2
        "LPE", // Level 3
        "FECO", // Level 4
        "DEFP", // Level 5
        "EFP", // Level 6
        "DEFPO", // Level 7
        "FEDOP", // Level 8
        "EDFCTO", // Level 9
        "FEDOPCTED" // Level 10
    ];

    const explanations = [
        "20/200 vision: Largest letters - should be readable by nearly everyone",
        "20/100 vision: Should be readable by most people without severe vision problems",
        "20/70 vision: Moderate vision impairment if not readable",
        "20/50 vision: Common requirement for driving in many states",
        "20/40 vision: Below average but still functional vision",
        "20/30 vision: Slightly better than average vision",
        "20/25 vision: Good vision, better than the standard 20/20",
        "20/20 vision: Normal visual acuity (what a person should see at 20 feet)",
        "20/15 vision: Better than normal vision",
        "20/10 vision: Exceptional visual acuity"
    ];

    function updateProgress() {
        const progress = (currentTest / totalTests) * 100;
        document.getElementById('progressBar').style.width = `${progress}%`;
    }

    function checkAnswer(testNumber) {
        const input = document.getElementById(`answer${testNumber}`);
        const userAnswer = input.value.trim().toUpperCase().replace(/\s+/g, '');
        const resultDiv = document.getElementById(`result${testNumber}`);

        const correctAnswer = correctAnswers[testNumber - 1]
        const explanation = explanations[testNumber - 1];

        const isCorrect = userAnswer === correctAnswer;

        testScores.push(isCorrect);

        resultDiv.textContent = isCorrect ?
            `✅ Correct! ${explanation}` :
            `❌ The correct answer was "${correctAnswer}". ${explanation}`;

        resultDiv.className = `result ${isCorrect ? 'correct' : 'incorrect'}`;
        resultDiv.style.display = 'block';

        input.disabled = true;
        input.nextElementSibling.disabled = true;

        setTimeout(() => {
            document.getElementById(`test${testNumber}`).classList.remove('active');
            currentTest++;
            if (currentTest <= totalTests) {
                document.getElementById(`test${currentTest}`).classList.add('active');
                updateProgress();

                // Scroll to the next test
                document.getElementById(`test${currentTest}`).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            } else {
                showFinalResults();
            }
        }, 2000);
    }

    function showFinalResults() {
        // Calculate the smallest line the user could read correctly
        let smallestLine = 0;
        for (let i = testScores.length - 1; i >= 0; i--) {
            if (testScores[i]) {
                smallestLine = i + 1;
                break;
            }
        }

        const visionRatings = [
            "20/200 or worse (Severe vision impairment)",
            "20/100 (Moderate vision impairment)",
            "20/70 (Mild vision impairment)",
            "20/50 (Below average vision)",
            "20/40 (Slightly below average)",
            "20/30 (Slightly better than average)",
            "20/25 (Good vision)",
            "20/20 (Normal vision)",
            "20/15 (Better than normal)",
            "20/10 (Exceptional vision)"
        ];

        const visionResult = smallestLine > 0 ? visionRatings[smallestLine - 1] : "20/200 or worse";

        let resultClass = '';
        if (smallestLine >= 8) {
            resultClass = 'excellent-score';
        } else if (smallestLine >= 6) {
            resultClass = 'good-score';
        } else if (smallestLine >= 4) {
            resultClass = 'fair-score';
        } else {
            resultClass = 'poor-score';
        }

        document.getElementById('resultsSummary').innerHTML = `
                <h3>Your Visual Acuity: <span class="${resultClass}">${visionResult}</span></h3>
                <p style="font-size: 1.2rem; margin: 20px 0;">
                    You were able to read down to Level ${smallestLine} (${visionRatings[smallestLine-1]})
                </p>
                <div class="results-details">
                    <h3>Detailed Results</h3>
                    <ul>
                        ${testScores.map((score, i) => `
                            <li>
                                <strong>Level ${i + 1} (${visionRatings[i]}):</strong> 
                                ${score ? '✅ Read successfully' : '❌ Could not read'}
                                <p>${explanations[i]}</p>
                            </li>
                        `).join('')}
                    </ul>
                </div>
                <p class="disclaimer-note" style="margin-top: 30px; font-style: italic;">
                    Note: This is not a substitute for a professional eye exam. 
                    For accurate results, this test should be taken at the standard testing distance.
                </p>
            `;

        document.getElementById('finalResults').style.display = 'block';
        document.getElementById('progressBar').style.width = '100%';

        // Scroll to results
        document.getElementById('finalResults').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    updateProgress();
</script>

</html>
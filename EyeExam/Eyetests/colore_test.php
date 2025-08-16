<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Comprehensive Color Blindness Test</title>
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

        input[type="text"],
        input[type="number"] {
            padding: 14px 20px;
            width: 250px;
            font-size: 1rem;
            border-radius: var(--border-radius);
            border: 2px solid #e0e0e0;
            background: #f9f9f9;
            transition: var(--transition);
            text-align: center;
            font-weight: 500;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
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

        .test-image {
            max-width: 100%;
            height: auto;
            max-height: 400px;
            display: block;
            margin: 20px auto;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: 8px solid white;
            transition: var(--transition);
        }

        .test-image:hover {
            transform: scale(1.01);
            box-shadow: var(--box-shadow-hover);
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

            input[type="text"],
            input[type="number"] {
                width: 80%;
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
            max-width: 700px;font-family: small;
            text-align: left;
        }

        .results-summary li {
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            transition: var(--transition);font-family: small;
        }

        .results-summary li:hover {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .results-summary li strong {
            color: var(--secondary-color);
            font-weight: 600;font-family: small;
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
        <h1 class="title">Color Blindness Test</h1>
        <div class="disclaimer">
            ⚠ This test is for informational purposes only and does not replace a professional eye examination. If you
            suspect any problems, consult an eye care specialist.
        </div>

        <div class="progress-bar">
            <div class="progress" id="progressBar"></div>
        </div>
    </div>
    <div class="container">

        <!-- Test Sections -->
        <!-- Test 1 -->
        <div class="test-section active" id="test1">
            <h2 class="test-title">1. Two-Digit Recognition </h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_01.jpg" alt="Ishihara Plate 01"
                class="test-image" />
            <div class="question">What number do you see in the circle?</div>
            <input type="text" id="colorAnswer1" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(1)">Submit Answer</button>
            <div class="result" id="result1"></div>
        </div>

        <!-- Test 2 -->
        <div class="test-section" id="test2">
            <h2 class="test-title">2. Red-Green Deficiency Test</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_02.jpg" alt="Ishihara Plate 8"
                class="test-image" />
            <div class="question">What number do you see?</div>
            <input type="text" id="colorAnswer2" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(2)">Submit Answer</button>
            <div class="result" id="result2"></div>
        </div>


        <!-- Test 3 -->
        <div class="test-section" id="test3">
            <h2 class="test-title">3. Basic Color Vision Test</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_03.jpg" alt="Ishihara Plate 03"
                class="test-image" />
            <div class="question">What number do you see in the circle?</div>
            <input type="text" id="colorAnswer3" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(3)">Submit Answer</button>
            <div class="result" id="result3"></div>
        </div>


        <!-- Test 4 -->
        <div class="test-section" id="test4">
            <h2 class="test-title">4. DarkGreen-Red Test</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_04.jpg" alt="Ishihara Plate 23"
                class="test-image" />
            <div class="question">What two-digit number do you see?</div>
            <input type="text" id="colorAnswer4" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(4)">Submit Answer</button>
            <div class="result" id="result4"></div>
        </div>

        <!-- Test 5 -->
        <div class="test-section" id="test5">
            <h2 class="test-title">5. Mild Color Deficiency</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_05.jpg" alt="Ishihara Plate 14"
                class="test-image" />
            <div class="question">What number is visible in the pattern?</div>
            <input type="text" id="colorAnswer5" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(5)">Submit Answer</button>
            <div class="result" id="result5"></div>
        </div>

        <!-- Test 6 -->
        <div class="test-section" id="test6">
            <h2 class="test-title">6. Hidden Number Test</h2>
            <img height="1000px" src="/Project_do_stage/Assets/Photos/Ishihara_06.gif" alt="Ishihara Plate 10"
                class="test-image" />
            <div class="question">Can you see any number? If yes, what is it? If none, type "none".</div>
            <input type="text" id="colorAnswer6" placeholder="Enter number or 'none'" autocomplete="off" />
            <button onclick="checkAnswer(6)">Submit Answer</button>
            <div class="result" id="result6"></div>
        </div>

        <!-- Test 7 -->
        <div class="test-section" id="test7">
            <h2 class="test-title">7. Number Recognition</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_07.jpg" alt="Ishihara Plate 9"
                class="test-image" />
            <div class="question">What number is visible?</div>
            <input type="text" id="colorAnswer7" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(7)">Submit Answer</button>
            <div class="result" id="result7"></div>
        </div>

        <!-- Test 8 -->
        <div class="test-section" id="test8">
            <h2 class="test-title">8. Strong Deficiency Test</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_08.jpg" alt="Ishihara Plate 16"
                class="test-image" />
            <div class="question">What number can you see?</div>
            <input type="text" id="colorAnswer8" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(8)">Submit Answer</button>
            <div class="result" id="result8"></div>
        </div>

        <!-- Test 9 -->
        <div class="test-section" id="test9">
            <h2 class="test-title">9. Green Sensitivity</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_09.jpg" alt="Ishihara Plate 21"
                class="test-image" />
            <div class="question">What number is visible in the pattern?</div>
            <input type="text" id="colorAnswer9" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(9)">Submit Answer</button>
            <div class="result" id="result9"></div>
        </div>

        <!-- Test 10 -->
        <div class="test-section" id="test10">
            <h2 class="test-title">10. Strong Green Sensitivity Test</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_10.jpg" alt="Ishihara Plate 13"
                class="test-image" />
            <div class="question">What number is visible?</div>
            <input type="text" id="colorAnswer10" placeholder="Enter number or 'none'" autocomplete="off" />
            <button onclick="checkAnswer(10)">Submit Answer</button>
            <div class="result" id="result10"></div>
        </div>

        <!-- Creative Test 11 -->
        <div class="test-section" id="test11">
            <h2 class="test-title">11. New Color Pattern</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_11.jpg"
                alt="Ishihara Plate 38" class="test-image" />
            <div class="question">What number is visible in the pattern?</div>
            <input type="text" id="colorAnswer11" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(11)">Submit Answer</button>
            <div class="result" id="result11"></div>
        </div>

        <!-- Creative Test 12 -->
        <div class="test-section" id="test12">
            <h2 class="test-title">12. Final Challenge</h2>
            <img src="/Project_do_stage/Assets/Photos/Ishihara_12.jpg"
                alt="Ishihara Plate 17" class="test-image" />
            <div class="question">What number do you see in this pattern?</div>
            <input type="text" id="colorAnswer12" placeholder="Enter the number" autocomplete="off" />
            <button onclick="checkAnswer(12)">Submit Answer</button>
            <div class="result" id="result12"></div>
        </div>

        <!-- Final Results -->
        <div id="finalResults" class="results-container">
            <h2 class="test-title">Your Color Blindness Test Results</h2>
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
    const totalTests = 12;
    let currentTest = 1;
    const testScores = [];

    // Correct answers for each test (case-insensitive)
    const correctAnswers = [
        '74', // Test 1
        '6',
        '16',
        '2',
        '29',
        'none',
        '45',
        '5',
        '97',
        '8',
        '42', // creative test 11
        '3' // creative test 12
    ];

    const explanations = [
        "Most people with normal color vision see it Different numbers may indicate color deficiency.", // creative test 1
        "This test specifically checks for red-green color blindness. The number  should be clear.", // creative test 2
        "This two-digit test checks color differentiation.", // creative test 3
        "Mild color deficiencies might make that number difficult to see clearly.", // creative test 4
        "Red-DarkGreen deficiencies might make the number hard to distinguish.", // creative test 5
        "People with normal vision typically see nothing here. Seeing a number may indicate color blindness.", // creative test 6
        "This Number recognition test  should be clearly visible to those with normal vision.", // creative test 7
        "Strong color deficiencies might prevent seeing the number clearly.", // creative test 8
        "Green sensitivity test , the number should be clearly visible.", // creative test 9
        "Final comprehensive test , the number  should be visible to those with normal color vision.", // creative test 10
        "New pattern test - should be clearly visible to those with normal vision ",
        "Final challenge test Most people with normal color vision see the numbers clearly." // creative test 12
    ];

    function updateProgress() {
        const progress = (currentTest / totalTests) * 100;
        document.getElementById('progressBar').style.width = `${progress}%`;
    }

    function checkAnswer(testNumber) {
        const input = document.getElementById(`colorAnswer${testNumber}`);
        const userAnswer = input.value.trim().toLowerCase();
        const resultDiv = document.getElementById(`result${testNumber}`);

        const correctAnswer = correctAnswers[testNumber - 1].toLowerCase();
        const explanation = explanations[testNumber - 1];

        const isCorrect = userAnswer === correctAnswer;

        testScores.push(isCorrect);

        resultDiv.textContent = isCorrect ?
            `✅ Correct! ${explanation}` :
            `❌ The expected answer was "${correctAnswer}". ${explanation}`;

        resultDiv.className = `result ${isCorrect ? 'correct' : 'incorrect'}`;
        resultDiv.style.display = 'block';

        input.disabled = true;
        input.nextElementSibling.disabled = true; // Disable button

        // Wait 2 seconds then go to next test or final results
        setTimeout(() => {
            // Hide current test
            document.getElementById(`test${testNumber}`).classList.remove('active');
            currentTest++;
            if (currentTest <= totalTests) {
                document.getElementById(`test${currentTest}`).classList.add('active');
                updateProgress();
            } else {
                showFinalResults();
            }
        }, 2000);
    }

    function showFinalResults() {
        const correctCount = testScores.filter(Boolean).length;
        const percentage = Math.round((correctCount / totalTests) * 100);

        let message = '';
        let scoreClass = '';

        if (percentage >= 75) {
            message = `🎉 Excellent! You scored ${percentage}% (${correctCount}/${totalTests}). Your color vision appears to be normal based on this test.`;
            scoreClass = 'excellent-score';
        } else if (percentage >= 50) {
            message = `👍 Good effort! You scored ${percentage}% (${correctCount}/${totalTests}). Some aspects of your color vision might need attention.`;
            scoreClass = 'good-score';
        } else {
            message = `🔍 You scored ${percentage}% (${correctCount}/${totalTests}). Consider consulting an eye care professional for a comprehensive exam.`;
            scoreClass = 'poor-score';
        }

        const details = testScores.map((score, i) => {
            return `<li>
                <strong>Test ${i + 1}:</strong> ${score ? '✅ Passed' : '❌ Needs attention'}
                <p>${explanations[i]}</p>
            </li>`;
        }).join('');

        document.getElementById('resultsSummary').innerHTML = `
            <p class="${scoreClass}">${message}</p>
            <div class="results-details">
                <h3>Detailed Results</h3>
                <ul>${details}</ul>
            </div>
            <p class="disclaimer-note">Remember, this is not a substitute for a professional eye exam.</p>
        `;

        document.getElementById('finalResults').style.display = 'block';
        document.getElementById('progressBar').style.width = '100%';
    }

    updateProgress();
</script>

</html>
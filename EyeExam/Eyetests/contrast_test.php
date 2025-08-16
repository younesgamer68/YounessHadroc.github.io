<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contrast Sensitivity Eye Test</title>
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

        .video-container {
            position: relative;
            max-width: 800px;
            width: 100%;
            margin: 20px auto;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
        }

        video {
            width: 100%;
            display: block;
        }

        .play-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .play-overlay.hidden {
            opacity: 0;
            pointer-events: none;
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

            .play-icon {
                width: 50px;
                height: 50px;
            }

            .play-icon:after {
                border-top: 15px solid transparent;
                border-bottom: 15px solid transparent;
                border-left: 25px solid var(--primary-color);
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
        <h1 class="title">Contrast Sensitivity Eye Test</h1>
        <div class="disclaimer">
            ⚠ This test is for informational purposes only and should not replace professional eye examinations.
            <br>Please view this test on a properly calibrated display in a well-lit room.
        </div>

        <div class="progress-bar">
            <div class="progress" id="progressBar"></div>
        </div>
    </div>
    <div class="container">

        <!-- Test Sections -->
        <!-- Test 1 -->
        <div class="test-section active" id="test1">
            <h2 class="test-title">Test 1: Low Contrast Detection</h2>
            <div class="video-container">
                <video id="video1" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast01.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay1" onclick="playVideo(1)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">At what point does the pattern become indistinguishable from the background?</div>
            <input type="number" id="answer1" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(1, '9')">Submit Answer</button>
            <div class="result" id="result1"></div>
        </div>

        <!-- Test 2 -->
        <div class="test-section" id="test2">
            <h2 class="test-title">Test 2: Fading Pattern Recognition</h2>
            <div class="video-container">
                <video id="video2" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast02.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay2" onclick="playVideo(2)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">When does the center pattern completely disappear?</div>
            <input type="number" id="answer2" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(2, '3')">Submit Answer</button>
            <div class="result" id="result2"></div>
        </div>

        <!-- Test 3 -->
        <div class="test-section" id="test3">
            <h2 class="test-title">Test 3: Gradient Sensitivity</h2>
            <div class="video-container">
                <video id="video3" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast03.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay3" onclick="playVideo(3)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">At what time does the gradient become uniform (no visible pattern)?</div>
            <input type="number" id="answer3" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(3, '5')">Submit Answer</button>
            <div class="result" id="result3"></div>
        </div>

        <!-- Test 4 -->
        <div class="test-section" id="test4">
            <h2 class="test-title">Test 4: Dynamic Contrast</h2>
            <div class="video-container">
                <video id="video4" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast04.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay4" onclick="playVideo(4)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">When does the moving pattern blend into the background?</div>
            <input type="number" id="answer4" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(4, '7')">Submit Answer</button>
            <div class="result" id="result4"></div>
        </div>

        <!-- Test 5 -->
        <div class="test-section" id="test5">
            <h2 class="test-title">Test 5: Fine Detail Contrast</h2>
            <div class="video-container">
                <video id="video5" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast05.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay5" onclick="playVideo(5)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">At what point can you no longer distinguish the fine lines?</div>
            <input type="number" id="answer5" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(5, '4')">Submit Answer</button>
            <div class="result" id="result5"></div>
        </div>

        <!-- Test 6 -->
        <div class="test-section" id="test6">
            <h2 class="test-title">Test 6: Radial Contrast Detection</h2>
            <div class="video-container">
                <video id="video6" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast06.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay6" onclick="playVideo(6)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">When does the radial pattern become invisible?</div>
            <input type="number" id="answer6" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(6, '9')">Submit Answer</button>
            <div class="result" id="result6"></div>
        </div>

        <!-- Test 7 -->
        <div class="test-section" id="test7">
            <h2 class="test-title">Test 7: Checkerboard Fade</h2>
            <div class="video-container">
                <video id="video7" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast07.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay7" onclick="playVideo(7)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">At what time does the checkerboard pattern disappear?</div>
            <input type="number" id="answer7" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(7, '6')">Submit Answer</button>
            <div class="result" id="result7"></div>
        </div>

        <!-- Test 8 -->
        <div class="test-section" id="test8">
            <h2 class="test-title">Test 8: Vertical Stripe Contrast</h2>
            <div class="video-container">
                <video id="video8" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast08.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay8" onclick="playVideo(8)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">When do the vertical stripes blend together?</div>
            <input type="number" id="answer8" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(8, '10')">Submit Answer</button>
            <div class="result" id="result8"></div>
        </div>

        <!-- Test 9 -->
        <div class="test-section" id="test9">
            <h2 class="test-title">Test 9: Horizontal Gradient</h2>
            <div class="video-container">
                <video id="video9" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast09.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay9" onclick="playVideo(9)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">At what point can you no longer see the horizontal divisions?</div>
            <input type="number" id="answer9" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(9, '2')">Submit Answer</button>
            <div class="result" id="result9"></div>
        </div>

        <!-- Test 10 -->
        <div class="test-section" id="test10">
            <h2 class="test-title">Test 10: Circular Fade Pattern</h2>
            <div class="video-container">
                <video id="video10" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast10.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay10" onclick="playVideo(10)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">When does the circular pattern completely fade?</div>
            <input type="number" id="answer10" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(10, '5')">Submit Answer</button>
            <div class="result" id="result10"></div>
        </div>

        <!-- Test 11 -->
        <div class="test-section" id="test11">
            <h2 class="test-title">Test 11: Diagonal Stripe Contrast</h2>
            <div class="video-container">
                <video id="video11" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast11.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay11" onclick="playVideo(11)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">At what time do the diagonal stripes become invisible?</div>
            <input type="number" id="answer11" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(11, '10')">Submit Answer</button>
            <div class="result" id="result11"></div>
        </div>

        <!-- Test 12 -->
        <div class="test-section" id="test12">
            <h2 class="test-title">Test 12: Complex Pattern Fade</h2>
            <div class="video-container">
                <video id="video12" muted>
                    <source src="/Project_do_stage/Assets/Videos/contrast12.mp4" type="video/mp4">
                </video>
                <div class="play-overlay" id="overlay12" onclick="playVideo(12)">
                    <div class="play-icon"></div>
                </div>
            </div>
            <div class="question">When does the complex pattern fully disappear?</div>
            <input type="number" id="answer12" placeholder="Enter seconds" min="1" max="10" step="0.1">
            <button onclick="checkAnswer(12, '8')">Submit Answer</button>
            <div class="result" id="result12"></div>
        </div>

        <!-- Final Results -->
        <div id="finalResults" class="results-container">
            <h2 class="test-title">Your Contrast Sensitivity Results</h2>
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
    // Test configuration
    const totalTests = 12;
    let currentTest = 1;
    const testScores = [];

    // Explanations for each test
    const explanations = [
        "Low contrast detection: Most people lose visibility around 9 seconds. Earlier detection may indicate reduced contrast sensitivity.",
        "Fading pattern recognition: Normal vision typically sees the pattern until about 3 seconds.",
        "Gradient sensitivity: The gradient should appear uniform at 5 seconds for normal vision.",
        "Dynamic contrast: Moving patterns usually blend at 7 seconds with normal contrast sensitivity.",
        "Fine detail contrast: Fine lines typically become indistinguishable around 4 seconds.",
        "Radial contrast detection: The radial pattern normally disappears at 9 seconds.",
        "Checkerboard fade: Checkerboards usually become invisible by 6 seconds.",
        "Vertical stripe contrast: Vertical stripes typically blend at 10 seconds.",
        "Horizontal gradient: Horizontal divisions normally fade by 2 seconds.",
        "Circular fade pattern: The circular pattern should fully fade by 5 seconds.",
        "Diagonal stripe contrast: Diagonal stripes usually become invisible at 10 seconds.",
        "Complex pattern fade: Complex patterns typically disappear by 8 seconds."
    ];

    // Initialize videos to pause at start and set playback rate
    document.addEventListener('DOMContentLoaded', function() {
        for (let i = 1; i <= totalTests; i++) {
            const video = document.getElementById(`video${i}`);
            video.pause();
            video.currentTime = 0;
            video.playbackRate = 2.0; // Set default playback rate to 2x
        }
        updateProgress();
    });

    // Update progress bar
    function updateProgress() {
        const progress = (currentTest / totalTests) * 100;
        document.getElementById('progressBar').style.width = `${progress}%`;
    }

    // Play video when overlay is clicked (always at 2x speed)
    function playVideo(testNumber) {
        const video = document.getElementById(`video${testNumber}`);
        const overlay = document.getElementById(`overlay${testNumber}`);

        // Ensure playback rate is 2x (in case it was changed)
        video.playbackRate = 2.0;
        video.play();
        overlay.classList.add('hidden');

        // When video ends, show overlay again
        video.onended = function() {
            overlay.classList.remove('hidden');
            video.currentTime = 0;
            // Keep playback rate at 2x for next viewing
            video.playbackRate = 2.0;
        };
    }

    // Check user's answer (always play at 2x speed)
    function checkAnswer(testNumber, correctAnswer) {
        const input = document.getElementById(`answer${testNumber}`);
        const userAnswer = input.value.trim();
        const resultDiv = document.getElementById(`result${testNumber}`);
        const button = input.nextElementSibling;
        const video = document.getElementById(`video${testNumber}`);
        const overlay = document.getElementById(`overlay${testNumber}`);

        // Play the video at 2x speed when answer is submitted
        video.playbackRate = 2.0;
        video.play();
        overlay.classList.add('hidden');

        const isCorrect = userAnswer === correctAnswer;
        testScores.push(isCorrect);

        resultDiv.textContent = isCorrect ?
            `✅ Correct! ${explanations[testNumber-1]}` :
            `❌ The expected answer was ${correctAnswer}. ${explanations[testNumber-1]}`;

        resultDiv.className = `result ${isCorrect ? 'correct' : 'incorrect'}`;
        resultDiv.style.display = 'block';

        input.disabled = true;
        button.disabled = true;

        // Move to next test or show final results after video ends
        video.onended = function() {
            setTimeout(() => {
                if (currentTest < totalTests) {
                    document.getElementById(`test${currentTest}`).classList.remove('active');
                    currentTest++;
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
            }, 1000);
        };
    }

    // Show final results
    function showFinalResults() {
        const correctCount = testScores.filter(score => score).length;
        const percentage = Math.round((correctCount / totalTests) * 100);

        let message, resultClass;
        if (percentage >= 90) {
            message = `🎉 Excellent Contrast Sensitivity! You scored ${percentage}% (${correctCount}/${totalTests}).`;
            resultClass = 'excellent-score';
        } else if (percentage >= 75) {
            message = `👍 Good Contrast Sensitivity! You scored ${percentage}% (${correctCount}/${totalTests}).`;
            resultClass = 'good-score';
        } else if (percentage >= 50) {
            message = `⚠️ Fair Contrast Sensitivity. You scored ${percentage}% (${correctCount}/${totalTests}). Some patterns were difficult to detect.`;
            resultClass = 'fair-score';
        } else {
            message = `🔍 Low Contrast Sensitivity. You scored ${percentage}% (${correctCount}/${totalTests}). Consider consulting an eye care professional.`;
            resultClass = 'poor-score';
        }

        const details = testScores.map((score, i) => {
            return `<li>
                    <strong>Test ${i+1}:</strong> ${score ? '✅ Passed' : '❌ Needs attention'}
                    <p>${explanations[i]}</p>
                </li>`;
        }).join('');

        document.getElementById('resultsSummary').innerHTML = `
                <p class="${resultClass}">${message}</p>
                <div class="results-details">
                    <h3>Detailed Results</h3>
                    <ul>${details}</ul>
                </div>
                <p class="disclaimer-note">Remember, this is not a substitute for a professional eye exam.</p>
            `;

        document.getElementById('finalResults').style.display = 'block';
        document.getElementById('progressBar').style.width = '100%';
    }
</script>

</html>
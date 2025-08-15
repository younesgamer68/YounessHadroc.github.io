<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Golden Bread</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Global Styles */
        :root {
            --primary-color: #b5985a;
            --secondary-color: #2e2e2e;
            --text-color: #ddd;
            --text-secondary: #888;
            --background-color: #2e2e2e;
            --input-border: #666;
            --section-padding: 130px 8%;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* Container & Layout */
        .contact-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: var(--section-padding);
        }

        .contact-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1100px;
            gap: 60px;
        }

        .contact-col {
            display: flex;
            flex-direction: column;
        }

        .contact-info-col {
            min-width: 320px;
        }

        .contact-form-col {
            flex: 1;
        }

        /* Contact Info Section */
        .contact-title h2 {
            position: relative;
            font-size: 28px;
            color: var(--text-color);
            display: inline-block;
            margin-bottom: 25px;
        }

        .contact-title h2::before {
            content: '';
            position: absolute;
            width: 50%;
            height: 1px;
            background-color: var(--text-secondary);
            top: 120%;
            left: 0;
        }

        .contact-title h2::after {
            content: '';
            position: absolute;
            width: 25%;
            height: 3px;
            background-color: var(--primary-color);
            top: calc(120% - 1px);
            left: 0;
        }

        .contact-title p {
            font-size: 17px;
            color: var(--text-secondary);
            padding-bottom: 22px;
            line-height: 1.5;
        }

        .contact-info {
            margin-bottom: 16px;
        }

        .icon-group {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .icon-group .icon {
            width: 45px;
            height: 45px;
            border: 2px solid var(--primary-color);
            border-radius: 50%;
            margin-right: 20px;
            position: relative;
            flex-shrink: 0;
        }

        .icon-group .icon i {
            font-size: 20px;
            color: var(--text-color);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .icon-group .details span {
            display: block;
            color: var(--text-secondary);
            font-size: 18px;
        }

        .icon-group .details span:first-child {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 5px;
        }

        /* Social Media */
        .social-media {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin: 22px 0;
        }

        .social-media a {
            width: 35px;
            height: 35px;
            text-decoration: none;
            text-align: center;
            margin-right: 15px;
            border-radius: 5px;
            background-color: var(--primary-color);
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social-media a i {
            color: var(--text-color);
            font-size: 18px;
            transition: color 0.4s ease;
        }

        .social-media a:hover {
            transform: translateY(-5px);
            background-color: var(--background-color);
            border: 1px solid var(--primary-color);
        }

        .social-media a:hover i {
            color: var(--primary-color);
        }

        /* Contact Form */
        .message-form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding-top: 30px;
            gap: 18px 0;
        }

        .input-group {
            position: relative;
            width: 100%;
        }

        .half-width {
            width: calc(50% - 10px);
        }

        .full-width {
            width: 100%;
        }

        .message-form input,
        .message-form textarea {
            width: 100%;
            font-size: 18px;
            padding: 10px 0;
            background-color: transparent;
            color: var(--text-color);
            border: none;
            border-bottom: 2px solid var(--input-border);
            outline: none;
        }

        .message-form textarea {
            resize: none;
            height: 200px;
            display: block;
        }

        textarea::-webkit-scrollbar {
            width: 5px;
        }

        textarea::-webkit-scrollbar-track {
            background-color: #1e1e1e;
            border-radius: 15px;
        }

        .input-group label {
            position: absolute;
            left: 0;
            bottom: 10px;
            color: var(--text-secondary);
            font-size: 18px;
            transition: all 0.4s ease;
            pointer-events: none;
        }

        .input-group input:focus~label,
        .input-group textarea:focus~label,
        .input-group input:valid~label,
        .input-group textarea:valid~label {
            transform: translateY(-30px);
            font-size: 16px;
            color: var(--primary-color);
        }

        .input-group button {
            padding: 12px 30px;
            font-size: 18px;
            background-color: var(--primary-color);
            color: var(--text-color);
            border: 1px solid transparent;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            margin-top: 10px;
        }

        .input-group button:hover {
            background-color: transparent;
            color: var(--primary-color);
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid var(--primary-color);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-row {
                flex-direction: column;
                gap: 40px;
            }
            
            .contact-info-col, 
            .contact-form-col {
                width: 100%;
            }
            
            .half-width {
                width: 100%;
            }
            
            .contact-container {
                padding: 80px 5%;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <header>
        <?php include("../NavBar/navbar.php") ?>
    </header>

    <!-- Main Contact Content -->
    <div class="contact-container">
        <main class="contact-row">
            <!-- Contact Information Section -->
            <section class="contact-col contact-info-col">
                <div class="contact-title">
                    <h2>Contact Us</h2>
                    <p>If you want to place an order, ask a question, make a remark, or have any other comments, please don't hesitate to contact us:</p>
                </div>

                <div class="contact-info">
                    <div class="icon-group">
                        <div class="icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="details">
                            <span>Phone</span>
                            <span>+212-07-02-56-13-62</span>
                        </div>
                    </div>

                    <div class="icon-group">
                        <div class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="details">
                            <span>Email</span>
                            <span>GoldenBread@gmail.com</span>
                        </div>
                    </div>

                    <div class="icon-group">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="details">
                            <span>Location</span>
                            <span>Hay Salam, Agadir, Morocco</span>
                        </div>
                    </div>
                </div>

                <div class="social-media">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </section>

            <!-- Contact Form Section -->
            <section class="contact-col contact-form-col">
                <form class="message-form">
                    <div class="input-group half-width">
                        <input type="text" name="name" required>
                        <label>Your Name</label>
                    </div>

                    <div class="input-group half-width">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>

                    <div class="input-group full-width">
                        <input type="text" name="subject" required>
                        <label>Subject</label>
                    </div>

                    <div class="input-group full-width">
                        <textarea name="message" required></textarea>
                        <label>Message</label>
                    </div>

                    <div class="input-group full-width">
                        <button type="submit">Send Message</button>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <!-- Footer Section -->
    <footer>
        <?php include("../Footer/footer_css.html"); ?>
    </footer>
</body>

</html>
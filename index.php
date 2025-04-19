<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
    <link rel="shortcut icon" href="./imgs/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php
    include './php/includes/bootstrap.php';
    include './php/includes/header.php';
    include './php/includes/nav.php';
    ?>
    <section class="hero text-center">
        <div class="container">
            <h1 data-aos="fade-up" data-aos-duration="1000">Welcome to the Programming Terms Dictionary</h1>
            <p data-aos="fade-up" data-aos-delay="300" class="lead">Your go-to web application for understanding and managing programming concepts.</p>
            <a href="php/search.php" class="btn btn-light btn-lg mt-4" data-aos="zoom-in" id="explore" data-aos-delay="600">Explore Dictionary</a>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Your Awesome Programming Dictionary!</h5>
                            <p class="card-text">Imagine a super cool online encyclopedia, but instead of just any words, it's packed with all the secret codes and special lingo that programmers use! That's what you've built! Your website is like a treasure chest filled with definitions for things like 'variables,' 'loops,' and 'functions.' It's built with PHP, which is like the website's brain, and Bootstrap, which makes it look super neat and organized. JavaScript adds all the fun, interactive bits, like buttons that do cool things and maybe even some animations!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Decoding Computer Language!</h5>
                            <p class="card-text">Think of it as your own digital guidebook for learning how to speak 'computer.' If you're ever confused about what a 'bug' is (don't worry, it's not a real insect!), or what it means to 'debug' something, your website has the answers. You used PHP to make it work behind the scenes, Bootstrap to make sure it looks good on any screen (like your phone or tablet!), and JavaScript to add those extra little touches that make it fun to explore. It's like having a friendly robot explain all the tricky programming words in a way that makes sense.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">A Helpful Tool for Code Learners!</h5>
                            <p class="card-text">You've created a fantastic resource for anyone wanting to learn the language of computers! It's like a secret decoder for all the programming terms that might seem confusing at first. Your website is built with PHP, which is like the engine that makes everything run smoothly, Bootstrap, which makes sure it's easy to read and navigate, and JavaScript, which adds all the exciting interactive elements. It's a great way to help people understand the world of coding, one definition at a time!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center g-4 mt-5">
                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Adding New Words to the Dictionary (Insert Page)</h5>
                            <p class="card-text">Imagine you're adding new pages to a big, cool notebook. On your "Insert" page, you can type in new programming words and their meanings. It's like you're teaching your website new things! You're telling it, "Hey, this word means this!" This page helps your dictionary grow bigger and better.</p>
                            <a href="./php/insert.php" class="btn mb-3 btn-primary">Try Adding new one now!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Fixing Mistakes or Removing Words (Update and Delete Pages)</h5>
                            <p class="card-text">Oops, did you write something wrong? Or maybe a word isn't needed anymore? No problem! The "Update" page lets you change the meaning of a word, like fixing a typo in your notebook. And the "Delete" page is like using an eraser to take away a word completely. It's all about keeping your dictionary neat and correct!</p>
                            <a href="./php/update.php" class="btn mb-3 btn-primary">Update Page</a>
                            <a href="./php/delete.php" class="btn mb-3 btn-primary">Delete Page</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Finding the Words You Need (Search Page)</h5>
                            <p class="card-text">Think of your "Search" page as a super-fast way to find any word in your dictionary. Just type in the word you're looking for, and poof! Your website will find it for you right away. It's like having a magic finder that helps you learn quickly! This page makes it super easy to explore all the programming terms you've added.</p>
                            <a href="./php/search.php" class="btn mb-3 btn-primary">Try Searching now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include './php/includes/footer.php';
    ?>
</body>

</html>
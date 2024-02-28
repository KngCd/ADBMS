<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pansol Integrated National High School</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header id="myHeader" class>
    <div class="head" id="header">
    <div class="h2"><img class="logo" src="schooal.png" alt=""><p class="sc">Pansol Integrated <br>National High School<p/></div>
            <div class="h3">
            <a class="nav-link" href="#content-container">HOME</a>
            <a class="nav-link" href="#about">ABOUT</a>
            <a class="nav-link" href="#contact">CONTACT US</a>
            </div>
            <button onclick="location.href='new.php'" class="bn54">
                <span class="bn54span">Login</span>
            </button>
    </div>
    </header>
    <script>
    window.addEventListener('scroll', function() {
      const header = document.getElementById('myHeader');
      const scrollPosition = window.pageYOffset;

      if (scrollPosition > 50) {
        header.style.backgroundColor = 'rgba(30, 97, 243, 0.836)';
      } else {
        header.style.backgroundColor = 'transparent';
      }
    });
  </script>
<div class="content-container" id="content-container">
            <div class="h-container">
                <p class="paragraph">
                <span style="--d: 0s;">A FREE AND</span>
                <span style="--d: .1s;">SIMPLE</span>
                <span style="--d: .2s;">LEARNING</span>
                <span style="--d: .3s;">MANAGEMENT SYSTEM</span>
            </p>    
            </div>
            <div class="hh">
            <p class="paragraph">
                <span style="--d: .4s;">An LMS streamlines education</span>
                <span style="--d: .5s;">by centralizing content </span>
                <span style="--d: .6s;">and activities for improved learning.</span>
                <span style="--d: .7s;"><button class="button" onclick="location.href='Register.php'">GET STARTED </button></span>
            </p>     
        </div>
</div>
    
    <div class="container2">
        <img class="logo2" src="padre.png" alt="">
        <img class="logo2" src="sk.png" alt="">
        <img class="logo3" src="deped2.png" alt="">
        <img class="logo2" src="school.png" alt="">
        <img class="logo2" src="deped.png" alt="">
    </div>

    <div id="about">
        <h1>about</h1>
    </div>

    <div id="contact">
        <h1>Let's Talk</h1>
        <p>Use Below Form or Email me direct: pansolgarcia@yahoo.com/301132@deped.gov.ph</p>
        <div class="form">
        <div class="input-wrapper">
            <input type='text' id='input' autocomplete="off" required ></input>
            <label for='input' class='placeholder'>Name</label>
        </div>
        <div class="input-wrapper">
            <input type='email' id='input' autocomplete="off" required ></input>
            <label for='input' class='placeholder'>Email</label>
        </div>
        <div class="input-wrapper">
            <input type='text' id='input' autocomplete="off" required ></input>
            <label for='input' class='placeholder'>Contact Number</label>
        </div>
        <div class="input-wrapper-message">
            <input type='text' id='input' autocomplete="off" required ></input>
            <label for='input' class='placeholder'>Message</label>
        </div>
        <button>Submit</button>
        </div>
    </div>
</body>

    <footer>
        <div class="ft1">
        <h4>Follow Us</h4>
        <ul class="wrapper">
            <li class="icon facebook">
            <span><i class="fab fa-facebook-f"><a href="https://www.facebook.com/profile.php?id=100069237878821"><img class="img" src="fb.png"/></a></i></span>
            </li>
            <li class="icon discord">
            <span><i class="fab fa-discord-f"><a href="https://discord.com/"><img class="img" src="dc.png"/></a></i></span>
            </li>
            <li class="icon github">
            <span><i class="fab fa-github"><a href="https://github.com/"><img class="img" src="github.png"/></a></i></span>
            </li>
            <li class="icon youtube">
            <span><i class="fab fa-youtube"><a href="https://www.youtube.com/watch?v=zZ6vybT1HQs"><img class="img" src="yt.png"/></a></i></span>
            </li>
        </ul>
        </div>
        <div class="ft2">
        <div class="card">
            <h4>Products</h4>
            <a href="" class="btn">LMS for Education</a><br>
            <a href="" class="btn">Classroom</a><br>
            <a href="" class="btn">Assignments</a><br>
            <a href="" class="btn">PHP Database</a><br>
        </div>
        <div class="card">
            <h4>Get Products</h4>
            <a href="" class="btn">Contact Sales</a><br>
            <a href="" class="btn">Apply for Cloud Credits</a><br>
            <a href="" class="btn">Sign up</a><br>
            <a href="" class="btn">Accesbility</a><br>
        </div>
        <div class="card">
            <h4>For Educators</h4>
            <a href="" class="btn">Overview</a><br>
            <a href="" class="btn">Product Guides</a><br>
            <a href="" class="btn">Communities</a><br>
            <a href="" class="btn">FAQ</a><br>
        </div>
        <div class="card">
            <h4>About Our LMS</h4>
            <a href="" class="btn">Our Commitment</a><br>
            <a href="" class="btn">For K12</a><br>
            <a href="" class="btn">Accesbility</a><br>
            <a href="" class="btn">Distance Learning</a><br>
        </div>
    </div>
    </footer>
    
</html>


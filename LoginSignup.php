<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin/Signup</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
		<?php
                include("config.php");

                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $school = $_POST['school'];
                    $age = $_POST['age'];
                    $password = $_POST['password'];
                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    // Verify if email is unique
                    $verify_query = mysqli_query($con, "SELECT 'user' as type, Email FROM users WHERE Email ='$email'
                                    UNION
                                    SELECT 'teacher' as type, Email FROM teachers WHERE Email ='$email'");

                    if(mysqli_num_rows($verify_query) != 0){
                        echo "<div class='message'>
                                <p>This email is already in use. Please choose another one.</p>
                              </div><br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        if (isset($_POST['role'])){
                            $role = $_POST['role'];
                            if($role == "student"){
                                // Insert user into the students table
                                mysqli_query($con, "INSERT INTO users (Username, Email, Age, Password, School, Address) VALUES ('$username', '$email', '$age', '$hash','$school','$address')") or die("Error Occurred");

                                echo "<div class='message'>
                                        <p>Registration Successful</p>
                                      </div><br>";
                                echo "<a href='Login.php'><button class='btn'>Login Now</button>";
                            }
                            elseif($role == "teacher"){
                                // Insert user into the teachers table
                                mysqli_query($con, "INSERT INTO teachers (Username, Email, Age, Password, School, Address) VALUES ('$username', '$email', '$age', '$hash','$school','$address')") or die("Error Occurred");

                                echo "<div class='message'>
                                        <p>Registration Successful</p>
                                      </div><br>";
                                echo "<a href='Login.php'><button class='btn'>Login Now</button>";
                            }
                        }
                    }
                } else {
                ?>
            <form action=""  method="post">
                <h1>Create Account</h1>
                <input type="text" placeholder="Name" name="username" id="username" autocomplete="off" required />
                <input type="email" placeholder="Email" name="email" id="email" autocomplete="off" oninput="this.value = this.value.toLowerCase();" required/>
				<input type="number" placeholder="Age" name="age" id="age" autocomplete="off" required/>
				<input type="text" placeholder="Address" name="address" id="address" autocomplete="off" required/>
				<input type="text" placeholder="School" name="school" id="school" autocomplete="off" required/>
            
				<div class="password-wrapper">
					<i class="far fa-eye-slash" id="togglePassword"></i>
					<input type="password" placeholder="Password" name="password" id="password" autocomplete="off" required />
				</div>
				<div class="radio-container">
					<input type="radio" value="student" name="role" id="student" required><label for="student">Student</label>
					<input type="radio" value="teacher" name="role" id="teacher" required><label for="teacher">Teacher</label>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Sign up">
                </div>
            </form>
			<?php } ?>
        </div>
		<script>
			const togglePassword = document.getElementById("togglePassword");
			const password = document.getElementById("password");

			togglePassword.addEventListener("click", () => {
			if (password.type === "password") {
				password.type = "text";
				togglePassword.classList.remove("fa-eye-slash");
				togglePassword.classList.add("fa-eye");
			} else {
				password.type = "password";
				togglePassword.classList.remove("fa-eye");
				togglePassword.classList.add("fa-eye-slash");
			}
			});
			</script>


        <div class="form-container sign-in-container">
		<?php
                include("config.php");

                if (isset($_POST['submit'])) {
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    

                    // When the user creates their account
                    $password = $_POST['password'];
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // When the user logs in
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if (empty($row)) {
                        // If not found in Students table, check the Teachers table
                        $result = mysqli_query($con, "SELECT * FROM teachers WHERE Email='$email'") or die("Select Error");
                        $row = mysqli_fetch_assoc($result);
                    }

                    if (is_array($row) && !empty($row)) {
                        // Verify the hashed password
                        if (password_verify($password, $row['Password'])) {
                            $_SESSION['valid'] = true; // Set a variable for successful login
                            $_SESSION['username'] = $row['Username'];
                            $_SESSION['age'] = $row['Age'];
                            $_SESSION['id'] = $row['Id'];
                            $role = isset($_POST['role']) ? $_POST['role'] : '';

                            // Redirect to the appropriate home page
                            if ($role == 'students') {
                                header("Location: SHome.php");
                            } elseif ($role == 'teachers') {
                                header("Location: THome.php");
                            }
                            exit();
                        } else {
                            echo "<div class='message'>
                                <p>Wrong Username or Password</p>
                                </div> <br>";
                            echo "<a href='LoginSignup.php'><button class='btn'>Go Back</button>";
                        }
                    }
                } else {
                ?>
            <form action="" method="post">
                <h1>Sign in</h1>
				<input type="email" placeholder="Email" name="email" id="email" autocomplete="off" oninput="this.value = this.value.toLowerCase();" required/>
				<div class="password-wrapper">
					<i class="far fa-eye-slash" id="togglePasswords"></i>
					<input type="password" placeholder="Password" name="password" id="passwords" autocomplete="off" required />
				</div>

				<div class="radio-container">
					<input type="radio" value="student" name="role" id="student" required><label for="student">Student</label>
					<input type="radio" value="teacher" name="role" id="teacher" required><label for="teacher">Teacher</label>
                </div>
                <a href="#">Forgot your password?</a>
				<div class="field">
                    <input type="submit" class="btn" name="submit" value="Sign up">
                </div>
            </form>
			<?php } ?>
        </div>
			<script>
				const togglePasswords = document.getElementById("togglePasswords");
				const passwords = document.getElementById("passwords");

				togglePasswords.addEventListener("click", () => {
					if (passwords.type === "password") {
						passwords.type = "text";
						togglePasswords.classList.remove("fa-eye-slash");
						togglePasswords.classList.add("fa-eye");
					} else {
						passwords.type = "password";
						togglePasswords.classList.remove("fa-eye");
						togglePasswords.classList.add("fa-eye-slash");
					}
					});
			</script>
		

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () =>
		container.classList.add('right-panel-active'));

		signInButton.addEventListener('click', () =>
		container.classList.remove('right-panel-active'));
		</script>
</body>

</html>
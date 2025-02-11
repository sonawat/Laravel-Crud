<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <style>
        /* General Body Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form Container */
        form {
            background-color: #34495e;
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Title Styling */
        h2 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Input Fields */
        input[type="text"] {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: 1px solid #7f8c8d;
            border-radius: 4px;
            background-color: #ecf0f1;
            font-size: 16px;
            color: #2c3e50;
            transition: 0.3s ease;
        }

        /* Input Focus Style */
        input[type="text"]:focus {
            border-color: #2980b9;
            background-color: #fff;
            outline: none;
        }

        /* Submit Button */
        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        /* Submit Button Hover */
        input[type="submit"]:hover {
            background-color: #3498db;
        }

        /* Animations for Input Fields */
        input[type="text"] {
            animation: fadeIn 0.5s ease-in-out;
        }

        input[type="submit"] {
            animation: fadeIn 0.5s ease-in-out 0.3s;
        }

        /* Responsive Design for Smaller Screens */
        @media screen and (max-width: 768px) {
            form {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 22px;
            }
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <form action="/act" method="post">
        @csrf
        <h2>Sign Up</h2>
        <input type="text" name="fname" placeholder="First Name" >
        <input type="text" name="lname" placeholder="Last Name" >
        <input type="text" name="email" placeholder="Email" >
        <input type="text" name="age" placeholder="Age" >
        <input type="submit" value="Submit">
    </form>

</body>
</html>

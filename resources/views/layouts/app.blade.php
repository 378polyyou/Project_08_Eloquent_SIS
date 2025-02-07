<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- External Stylesheet -->
    <style>
        /* Basic Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Navbar Styles */
        nav {
            background-color:rgb(10, 125, 239);
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        nav ul li a:hover {
            color: #007bff;
            transform: scale(1.1);
        }

        /* Content Styles */
        .content {
            padding: 40px;
            background-color: #ffffff;
            margin-top: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="{{ route('students.index') }}">Student List</a></li>
            <li><a href="{{ route('register.create') }}">Add Student</a></li>
        </ul>
    </nav>

    <!-- Content Section -->
    <div class="content">
        @yield('content') <!-- Content for each page will go here -->
    </div>

</body>
</html>

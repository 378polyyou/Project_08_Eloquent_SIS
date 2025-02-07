@extends('layouts.app') 

@section('content')
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
    <style>
        /* Basic styling for the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        /* Styling for the header */
        h1 {
            text-align: center;
            color: #333;
        }
        /* Styling for the form */
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Styling for the labels */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        /* Styling for the input fields and select dropdown */
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        /* Styling for the button */
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        /* Styling for the button when hovered */
        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>Course Registration</h1>
    <!-- Form for course registration -->
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <!-- Student Details -->
        <label for="student_name">Name:</label>
        <input type="text" id="student_name" name="name" required>
        <br>
        <label for="student_email">Email:</label>
        <input type="email" id="student_email" name="email" required>
        <br>
        <!-- Course Selection -->
        <label for="course_id">Select Course:</label>
        <select name="course_id" id="course_id" required>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }} ({{ $course->course_code }})</option>
            @endforeach
        </select>
        <br>
        <!-- Submit button -->
        <button type="submit">Register</button>
    </form>
</body>
</html>
@endsection
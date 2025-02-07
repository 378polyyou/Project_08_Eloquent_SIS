@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        /* Basic styling for the body */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 40px;
        }
        /* Styling for the header */
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 36px;
        }
        /* Styling for the form */
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        /* Styling for the labels */
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: #555;
            font-weight: 600;
        }
        /* Styling for the input fields */
        input {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fafafa;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s, background-color 0.3s;
        }
        /* Styling for the input fields when focused */
        input:focus {
            border-color: #3498db;
            background-color: #f0faff;
            outline: none;
        }
        /* Styling for the button */
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 14px 28px;
            width: 100%;
            font-size: 18px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.2s;
        }
        /* Styling for the button when hovered */
        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
        /* Styling for form groups */
        .form-group {
            margin-bottom: 20px;
        }
        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            form {
                padding: 30px;
            }
            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

    <h1>Edit Student</h1>

    <!-- Form for editing student details -->
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Student ID field (read-only) -->
        <div class="form-group">
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" value="{{ $student->student_id }}" readonly>
        </div>

        <!-- Name field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $student->name }}" required>
        </div>

        <!-- Email field -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $student->email }}" required>
        </div>

        <!-- Submit button -->
        <button type="submit">Update</button>
    </form>

</body>
</html>
@endsection

@extends('layouts.app') 

@section('content') 
    
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- //การเรียกใช้งานไฟล์ css ที่อยู่ในโฟลเดอร์ public -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4c4c4c;
            font-size: 32px;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #f1f1f1;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        form {
            display: inline;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 12px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <h1>Student List</h1>

    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}">Edit</a> |
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

@endsection

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลหลักสูตร</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">ข้อมูลหลักสูตร</h1>

    <!-- แสดงตารางข้อมูล courses -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>รหัสหลักสูตร</th>
                <th>ชื่อหลักสูตร</th>
                <th>หน่วยกิต</th>
                <th>อาจารย์ผู้สอน</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->credits }}</td>
                    <td>{{ $course->teacher->name ?? 'ไม่มีข้อมูล' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

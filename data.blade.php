<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>Document</title>

    <style>
         <style>
        body, table {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
        }
        <style>
            body, table {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
        }

        table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            background-color: #f9f9f9;
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }


        tr:hover {
            background-color: #f1f1f1;
        }

        /* Alternating row colors */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Border styling for table */
        th, td {
            border: 1px solid #ddd;
        }

        /* Add a little padding around the table */
        body {
            background-color: #f0f0f0;
            padding: 20px;
        }

        /* Responsive Styling for small screens */
        @media screen and (max-width: 768px) {
            table {
                width: 100%;
            }

            th, td {
                padding: 8px;
            }
        }
        button {
        padding: 10px 20px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s ease-in-out;
        color: white;
        background-color: #4CAF50; /* Default color */
    }

    /* Button hover effect */
    button:hover {
        background-color: #45a049; /* Darker shade on hover */
        transform: translateY(-2px); /* Lift effect */
    }

    /* Button active (clicked) effect */
    button:active {
        background-color: #388e3c; /* Even darker shade on click */
        transform: translateY(0); /* Normal position */
    }

    /* Specific button for Add User */
    a button {
        background-color: #2196F3; /* Different color for Add User button */
    }

    a button:hover {
        background-color: #1976D2; /* Darker shade for Add User button hover */
    }

    a button:active {
        background-color: #1565C0; /* Darker shade on click for Add User */
    }

    /* Specific button for Delete */
    td a button {
        background-color: #f44336; /* Red color for Delete button */
    }

    td a button:hover {
        background-color: #e53935; /* Darker red for Delete hover */
    }

    td a button:active {
        background-color: #d32f2f; /* Darker red on click */
    }

    /* Specific button for Update */
    td button {
        background-color: #FF9800; /* Orange color for Update button */
    }

    td button:hover {
        background-color: #FB8C00; /* Darker orange on hover */
    }

    td button:active {
        background-color: #F57C00; /* Darker orange on click */
    }


    </style>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>FName</th>
            <th>LName</th>
            <th>Email</th>
            <th>Age</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php $x=1; ?>
        @foreach($data as $val)
            <tr>
                <td><?php echo $x++ ?></td>
                <td>{{$val->fname}}</td>
                <td>{{$val->lname}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->age}}</td>
                <td>
                    <!-- Delete button with confirmation popup -->
                    <button class="delete-btn" data-id="{{$val->id}}">Delete</button>
                </td>
                <td>
                    <a href="/update/{{$val->id}}"><button>Update</button></a>
                </td>
            </tr>
        @endforeach
    </table>

    <a href="insert"><button style="margin-left: 600px">Add User</button></a>

    <!-- SweetAlert and Toastr Notifications -->
    @if(session('message'))
        <script>
            var message = '{{ session('message') }}';
            var alertType = '{{ session('alert-type') }}';

            Swal.fire({
                icon: alertType,
                title: 'Notification',
                text: message,
                confirmButtonText: 'Okay'
            });
        </script>
    @endif

    <script>
        // SweetAlert2 Confirmation for Delete button
        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id'); // Get the ID of the row to be deleted
            var url = '/delete/' + id; // Build the URL for the delete route

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // Redirect to delete route if confirmed
                }
            });
        });
    </script>
</body>
</html>

<?php
$menus = config('menu');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Style the body */
        body {
            font-family: Arial;
            margin: 0;
        }

        /* Header/logo Title */
        .header {
            padding: 60px;
            text-align: center;
            background: #1abc9c;
            color: white;
        }

        /* Style the top navigation bar */
        .navbar {
            display: flex;
            background-color: #333;
        }

        /* Style the navigation bar links */
        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        /* Change color on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Column container */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        /* Create two unequal columns that sits next to each other */
        /* Sidebar/left column */
        .side {
            flex: 30%;
            background-color: #f1f1f1;
            padding: 20px;
        }

        /* Main column */
        .main {
            flex: 70%;
            background-color: white;
            padding: 20px;
        }

        /* Fake image, just for this example */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
        }


        /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 700px) {

            .row,
            .navbar {
                flex-direction: column;
            }
        }
    </style>
    <script>
        function myFunction() {
            document.getElementById("hiden").style.display = "none";
        }
    </script>
</head>

<body>



    <!-- Header -->
    <div class="header">
        <h1>Welcome admin Website</h1>
        <p>We will for you best experience</p>
    </div>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="#">Category</a>
        <a href="#">Product</a>
        <a href="#">Order</a>
        <a href="#">Link</a>
    </div>

    <!-- The flexible grid (content) -->
    <div class="row">
        <div class="side">
            <ul class="nav nav-item nav-pills nav-stacked">
                <li class="active "><a href="#">Dashboard</a></li>

            </ul>
            @foreach($menus as $item)
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#">{{$item['label']}}</a></li>
                @foreach($item['items'] as $name)

                <li id="hiden">
                    <a href="{{route($name['route'])}}" class="nav-link">{{$name['label']}}</a>
                </li>

                @endforeach

            </ul>
            @endforeach
        </div>
        <div class="main">
            @if(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('error')}}
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Success</strong> Action
            </div>
            @endif
            @yield('category')
            @yield('main')
            @yield('create_category')

        </div>
    </div>
    <!-- Footer -->
    <div class="footer">
        <h4>Name: Trần Thái Công</h4>
        <h4> email: congtran1026@gmail.com</h4>
        <h4>sđt : 0903462041</h4>
    </div>
    @yield('js')
</body>


</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('order.store')}}">
        @csrf
        @method('post')
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone number"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email"><br>

        <label for="f_name">First Name:</label>
        <input type="text" id="f_name" name="first_name" placeholder="Enter your first name"><br>

        <label for="l_name">Last Name:</label>
        <input type="text" id="l_name" name="last_name" placeholder="Enter your last name"><br>

        <label for="home_address_details">Home Address Details:</label>
        <input type="text" id="home_address_details" name="home_address_details"
            placeholder="Enter additional address details"><br>

        <label for="street_address">Street Address:</label>
        <input type="text" id="street_address" name="street_address" placeholder="Enter your street address"><br>

        <label for="town_city">Town/City:</label>
        <input type="text" id="town_city" name="town_city" placeholder="Enter your town/city"><br>

        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" placeholder="Enter your user ID"><br>

        <button type="submit">Submit</button>
    </form>

</body>

</html>
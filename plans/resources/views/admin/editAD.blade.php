@extends('layout.master')
@section('body')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Setting Profile</h3>
                    <ul>
                        <li><a href="{{ route('admin.index') }}">home</a></li>
                        <li>Setting Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-form">
    @if(session('success'))
    <div class="btn">
        {{ session('success') }}
    </div>
    @endif
    <div class="right">
        <div class="container">
            <form action="{{ route('admin.updateAD', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="FullName">Full Name:</label>
                <input type="text" name="FullName" value="{{ $user->FullName }}" required>

                <label for="UserName">Username:</label>
                <input type="text" name="UserName" value="{{ $user->UserName }}" required>

                <label for="Phone">Phone Number:</label>
                <input type="text" name="Phone" value="{{ $user->Phone }}">

                <button type="submit">Save</button>
            </form>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button style="margin-left: 360px; margin-top: -45px;" type="submit">Logout</button>
            </form>

        </div>
    </div>
</div>

@endsection

<style>
    body {
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: "Open Sans", sans-serif;
        color: #333333;
    }


    .box-form {
        margin: 100px auto;
        width: 40%;
        background: #FFFFFF;
        border-radius: 10px;
        overflow: hidden;
        align-items: stretch;
        justify-content: space-between;
        box-shadow: 0 0 20px 6px #090b6f85;
    }

    .box-form .right {
        padding: 40px;
        width: 90%;
        overflow: hidden;
    }

    .box-form .right h1 {
        text-align: center;
        font-weight: bold;
    }

    .box-form .right label {
        display: block;
        position: relative;
        font-size: 16px;
    }

    .box-form .right input {
        width: 100%;
        font-size: 16px;
        margin-bottom: 15px;
        border: none;
        outline: none;
        border-bottom: 2px solid #B0B3B9;
    }

     .box-form .right button {

        color: #333333;
        font-size: 16px;
        padding: 12px 35px;
        margin-top: 35px;
        border-radius: 50px;
        display: inline-block;
        border: 0;
        outline: 0;
        box-shadow: 0px 4px 20px 0px #49c628a6;
    }

    @media (max-width: 980px) {
        .box-form {
            flex-flow: wrap;
            text-align: center;
            align-content: center;
            align-items: center;
        }

        .box-form .right {
            width: 100%;
        }
    }
    @media (max-width: 760px) {
        .box-form {
            width: 80%;
            margin-top: 150px;
            flex-flow: wrap;
            text-align: start;
        }

        .box-form .right {
            width:100%;
        }
        .box-form .right label {
        display: block;
        position: relative;
    }
    }
    @media (max-width: 460px) {
        .box-form {
            margin-top: 220px;
            width: 100%;
            flex-flow: wrap;
            text-align: start;

        }

        .box-form .right {
            width: 100%;
        }
        .box-form .right label {
        display: block;
        position: relative;
    }

}
</style>

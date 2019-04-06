
@extends('layouts.app')

@section('content')
    <!-- PRELOADER -->
   <div class="container">
       <form method="post" action="{{ route('admin.auth') }}">
           {{ csrf_field() }}
           <div class="form-group">
               <input name="login" type="text" class="form-control margin-top-10" placeholder="login">
               <input name="pass" type="password" class="form-control margin-top-10" placeholder="password">
               <button type="submit" class="btn btn-success margin-top-10">Login</button>
           </div>
       </form>
   </div>

@endsection


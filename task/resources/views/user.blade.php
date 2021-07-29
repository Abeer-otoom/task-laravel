<?php
use \App\Http\Controllers\UserController;

?>
<style>
    table, th, td {
  border: 1px solid black;
  width: 50%;
}
th, td {
  padding: 15px;
  text-align: left;
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Search User:
                    <form  action="{{route('users.all')}}"  method="GET">
                        @csrf
                        <input type="search" name="search" placeholder="Enter id ">
                        <input type="submit" value="search">
                    </form>
                    
                    <table >
                        <thead>
                    
                          <th>ID</th>
                    
                          <th>Name</th>
                    
                          <th>Email</th>
                    
                        </thead>
                    
                        <tbody>
                    @foreach($users as $user)
                            <tr>
                    
                              <td>{{$user->id}} </td>
                    
                              <td>{{$user->name}} </td>
                    
                              <td>{{$user->email}} </td>
            
                            </tr>
                            
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

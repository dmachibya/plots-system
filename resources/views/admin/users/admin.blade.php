@extends('layouts.master')

@section('content')
<div x-data="{adminModal: false}">
    <div class="flex justify-end">
        <button @click="adminModal = !adminModal" class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            Admin</button>
    </div>
    <div class="relative" x-show.transition="adminModal">
        <div class="bg-white rounded-lg fixed shadow-md top-8 w-full  sm:left-1/2 sm:w-96 sm:-ml-48  z-30">
            <span @click="adminModal = !adminModal" class="absolute top-2 right-4 text-4xl cursor-pointer">
                {{-- <i class="fa fa-close"></i> --}}
                &times;
            </span>

            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">New Admin</h1>
                <form action="/admin/users/admin/create" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Full Name</label>
                        <input type="text" name="fullname" placeholder="Full Name"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="">
                        <label for="district">District</label>
                        <br>
                        <select name="district">
                            <option value="Arusha Urban">Arusha Urban</option>
                            <option value="Arusha Rural">Arusha Rural</option>
                        </select>
                        {{-- <input type="text" name="district" placeholder="District"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md"> --}}
                    </div>
                    <div class="">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Email"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Password"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="">
                        <label for="name">Repeat Password</label>
                        <input type="password" name="rpassword" placeholder="Repeat Password"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div x-show.transition="adminModal" @click="adminModal = !adminModal"
        class="bg-black opacity-60 fixed w-full top-0 left-0 right-0 bottom-0 z-20">
    </div>
</div>
<div class="bg-white shadow-md px-8 py-6 rounded-md">
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>District</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>Default</td>
                <td>
                    Actions
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('bottom')

@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
        } );
</script>
@endsection
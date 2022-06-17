@extends('layouts.master')

@section('content')
<div class="bg-white shadow-md px-8 py-6 rounded-md">
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>
                    <a href="/authority/{{$item->level}}/{{$item->id}}"
                        class="bg-green-500 shadow-md px-4 py-2 text-white rounded-md my-2">View</a>
                    <a href="/authority/edit/{{$item->level}}/{{$item->id}}"
                        class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Edit</a>
                    <a href="/authority/delete/{{$item->id}}"
                        class="bg-red-500 shadow-md px-4 py-2 text-white rounded-md my-2">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
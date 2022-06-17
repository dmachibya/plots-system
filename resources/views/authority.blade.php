@extends('layouts.master')

@section('location')
<a href="/authority/1">
    Authorities
</a>
@endsection

@section('content')
<div x-data="{districtModal: false, tarafaModal: false, kataModal: false, kijijiModal: false, kiwanjaModal: false}">
    <div class="flex justify-end gap-x-4">

        @php
        $level = 0;
        if (isset($current_level)) {
        # code...
        $level = $current_level;
        }
        @endphp

        @switch($level)
        @case(0)
        @if (Auth::user()->role == '3')
        <button @click="districtModal = !districtModal"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            District</button>
        @endif
        @break
        @case(1)
        <button @click="tarafaModal = !tarafaModal"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            Tarafa</button>
        @break
        @case(2)
        <button @click="kataModal = !kataModal" class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            Kata</button>
        @break
        @case(3)
        <button @click="kijijiModal = !kijijiModal"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            Kijiji</button>
        @break
        @case(4)
        <button @click="kiwanjaModal = !kiwanjaModal"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            Kiwanja</button>
        @break
        @default

        @endswitch




    </div>
    <div class="relative" x-show.transition="districtModal">
        <div class="bg-white rounded-lg fixed shadow-md top-8 w-full  sm:left-1/2 sm:w-96 sm:-ml-48  z-30">
            <span @click="districtModal = !districtModal" class="absolute top-2 right-4 text-4xl cursor-pointer">
                {{-- <i class="fa fa-close"></i> --}}
                &times;
            </span>

            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">New District</h1>
                <form action="/admin/authority/1" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">District Name</label>
                        <input type="text" name="name" placeholder="District Name"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="relative" x-show.transition="tarafaModal">
        <div class="bg-white rounded-lg fixed shadow-md top-8 w-full  sm:left-1/2 sm:w-96 sm:-ml-48  z-30">
            <span @click="tarafaModal = !tarafaModal" class="absolute top-2 right-4 text-4xl cursor-pointer">
                {{-- <i class="fa fa-close"></i> --}}
                &times;
            </span>

            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">New Taarifa</h1>
                <form action="/admin/authority/2" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Tarafa Name</label>
                        <input type="text" name="name" placeholder="Tarafa Name"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="">
                        <label for="level_id">District</label>
                        <br>
                        @php
                        $districts = DB::table('authorities')->where('level', 1)->get();
                        if(isset($current_level_id)){
                        $districts = DB::table('authorities')->where('level', 1)->where('id',
                        $current_level_id)->get();

                        }else {
                        $districts = DB::table('authorities')->where('level', "1")->get();
                        }
                        @endphp
                        <input type="hidden" name="level" value="2">
                        <select name="parent_level_id">
                            @foreach ($districts as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="district" placeholder="District"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md"> --}}
                    </div>

                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="relative" x-show.transition="kataModal">
        <div class="bg-white rounded-lg fixed shadow-md top-8 w-full  sm:left-1/2 sm:w-96 sm:-ml-48  z-30">
            <span @click="kataModal = !kataModal" class="absolute top-2 right-4 text-4xl cursor-pointer">
                {{-- <i class="fa fa-close"></i> --}}
                &times;
            </span>

            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">New Kata</h1>
                <form action="/admin/authority/3" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Kata Name</label>
                        <input type="text" name="name" placeholder="Tarafa Name"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="">
                        <label for="district">Kata</label>
                        <br>
                        @php
                        $tarafas = DB::table('authorities')->where('level', 2)->get();
                        if(isset($current_level_id)){
                        $tarafas = DB::table('authorities')->where('level', 2)->where('id',
                        $current_level_id)->get();

                        }else {
                        $tarafas = DB::table('authorities')->where('level', "2")->get();
                        }
                        @endphp
                        <input type="hidden" name="level" value="3">
                        <select name="parent_level_id">
                            @foreach ($tarafas as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="district" placeholder="District"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md"> --}}
                    </div>

                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="relative" x-show.transition="kijijiModal">
        <div class="bg-white rounded-lg fixed shadow-md top-8 w-full  sm:left-1/2 sm:w-96 sm:-ml-48  z-30">
            <span @click="adminModal = !adminModal" class="absolute top-2 right-4 text-4xl cursor-pointer">
                {{-- <i class="fa fa-close"></i> --}}
                &times;
            </span>

            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">New Kijiji</h1>
                <form action="/admin/authority/3" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Kijiji Name</label>
                        <input type="text" name="name" placeholder="Kijij Name"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="">
                        <label for="district">Kata</label>
                        <br>
                        @php
                        // $users = DB::table('users')->where('role', 0)->get();
                        if(isset($current_level_id)){
                        $tarafas = DB::table('authorities')->where('level', 3)->where('id',
                        $current_level_id)->get();

                        }else {
                        $tarafas = DB::table('authorities')->where('level', 3)->get();
                        }
                        @endphp
                        <input type="hidden" name="level" value="4">
                        <select name="parent_level_id">
                            @foreach ($tarafas as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="district" placeholder="District"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md"> --}}
                    </div>

                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="relative" x-show.transition="kiwanjaModal">
        <div class="bg-white rounded-lg fixed shadow-md top-8 w-full  sm:left-1/2 sm:w-96 sm:-ml-48  z-30">
            <span @click="adminModal = !adminModal" class="absolute top-2 right-4 text-4xl cursor-pointer">
                {{-- <i class="fa fa-close"></i> --}}
                &times;
            </span>

            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">New Kiwanja</h1>
                <form action="/admin/authority/3" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Kiwanja Identifier</label>
                        <input type="text" name="name" placeholder="Kiwanja Identifier"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="">
                        <label for="district">Owner</label>
                        <br>
                        @php
                        $users = DB::table('users')->where('role', 0)->get();
                        $tarafas = DB::table('authorities')->where('level', 4)->get();
                        if(isset($current_level_id)){
                        $tarafas = DB::table('authorities')->where('level', 4)->where('id',
                        $current_level_id)->get();

                        }
                        @endphp
                        @if (count($tarafas)>=1)

                        <input type="hidden" name="parent_level_id" value="{{$tarafas[0]->id}}">
                        @endif

                        <input type="hidden" name="level" value="5">
                        <select name="owner">
                            <option value="0">Government</option>
                            @foreach ($users as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="district" placeholder="District"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md"> --}}
                    </div>

                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div x-show.transition="districtModal" @click="districtModal = !districtModal"
        class="bg-black opacity-60 fixed w-full top-0 left-0 right-0 bottom-0 z-20">
    </div>
    <div x-show.transition="tarafaModal" @click="tarafaModal = !tarafaModal"
        class="bg-black opacity-60 fixed w-full top-0 left-0 right-0 bottom-0 z-20">
    </div>
    <div x-show.transition="kataModal" @click="kataModal = !kataModal"
        class="bg-black opacity-60 fixed w-full top-0 left-0 right-0 bottom-0 z-20">
    </div>
    <div x-show.transition="kijijiModal" @click="kijijiModal = !kijijiModal"
        class="bg-black opacity-60 fixed w-full top-0 left-0 right-0 bottom-0 z-20">
    </div>
    <div x-show.transition="kiwanjaModal" @click="kiwanjaModal = !kiwanjaModal"
        class="bg-black opacity-60 fixed w-full top-0 left-0 right-0 bottom-0 z-20">
    </div>


</div>
<h1 class="text-4xl">

    @php
    if(isset($current_level_id)){

    $current = DB::table("authorities")->where("id", $current_level_id)->first();

    if($current != null){

    echo $current->name.' - ';

    switch ($current_level) {
    case 1:
    echo 'District';
    break;
    case 2:
    echo 'Tarafa';
    break;
    case 3:
    echo 'Kata';
    break;

    case 4:
    echo 'Kijiji';
    break;

    default:
    echo 'Kijiji';
    # code...
    break;
    }
    }


    }
    @endphp
</h1>
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

@section('bottom')

@endsection

@section('header')
<link rel="stylesheet" href="{{asset('css/buttons.dataTables.min.css')}}">
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ]
        });
        } );
</script>
<script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/jszip.min.js')}}"></script>
<script src="{{asset('js/pdfmake.min.js')}}"></script>
<script src="{{asset('js/vfs_fonts.js')}}"></script>
<script src="{{asset('js/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/buttons.print.min.js')}}"></script>
<script src="{{asset('js/buttons.colVis.min.js')}}"></script>
@endsection
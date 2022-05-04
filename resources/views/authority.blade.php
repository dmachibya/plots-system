@extends('layouts.master')

@section('content')
<div x-data="{districtModal: false, tarafaModal: false, kataModal: false, kijijiModal: false}">
    <div class="flex justify-end gap-x-4">
        <button @click="districtModal = !districtModal"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            District</button>
        <button @click="tarafaModal = !tarafaModal"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            Tarafa</button>
        <button @click="kataModal = !kataModal" class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            Kata</button>
        <button @click="kijijiModal = !kijijiModal"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Add
            Kijiji</button>
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
                        @endphp
                        <select name="level_id">
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
                <h1 class="font-bold text-xl text-center">New Admin</h1>
                <form action="/admin/users/admin/create" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Tarafa Name</label>
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
                <h1 class="font-bold text-xl text-center">New Admin</h1>
                <form action="/admin/users/admin/create" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Tarafa Name</label>
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

</div>
<h1 class="text-4xl">
    @php
    $current = DB::table("authorities")->where("id", $current_level_id)->first();
    @endphp
    {{
    $current->name
    }} -

    @switch($current_level)
    @case(1)
    District
    @break
    @case(2)
    Tarafa
    @break
    @case(3)
    Kata
    @break
    @case(4)
    Kijiji
    @break
    @default

    @endswitch
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
                    <a href="/authority/{{$item->level}}/{{$item->id}}" class="btn-primary">View</a>
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
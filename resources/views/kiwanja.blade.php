@extends('layouts.master')

@section('content')
<div x-data="{districtModal: false, tarafaModal: false, kataModal: false, kijijiModal: false, kiwanjaModal: false}">

    {{-- outer --}}
    @if ($kiwanja->price != Null)

    {{-- no pricee --}}
    {{-- one --}}
    @if (Auth::user()->role != "0")
    <div class="flex justify-end">
        <a href="/admin/kiwanja/sold/{{$kiwanja->authority_id}}"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Mark as Sold
        </a>
    </div>
    @else
    @if(Auth::user()->id == $kiwanja->user_id)
    <div class="flex justify-end">
        <a href="/admin/kiwanja/sold/{{$kiwanja->authority_id}}"
            class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Mark as Sold
        </a>
    </div>
    @endif
    @endif
    {{-- one --}}
    {{-- on sell operations below--}}
    @else
    @if (Auth::user()->role != "0")
    <div class="flex cursor-pointer justify-end" @click="districtModal = !districtModal">
        <div class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Mark as on sell
        </div>
    </div>
    @else

    @if(Auth::user()->id == $kiwanja->user_id)
    <div class="flex cursor-pointer justify-end" @click="districtModal = !districtModal">
        <div class="bg-blue-500 shadow-md px-4 py-2 text-white rounded-md my-2">Mark as on Sell
        </div>
    </div>
    @endif
    @endif
    @endif

    <div class="relative" x-show.transition="districtModal">
        <div class="bg-white rounded-lg fixed shadow-md top-8 w-full  sm:left-1/2 sm:w-96 sm:-ml-48  z-30">
            <span @click="districtModal = !districtModal" class="absolute top-2 right-4 text-4xl cursor-pointer">
                {{-- <i class="fa fa-close"></i> --}}
                &times;
            </span>

            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">Sell Kiwanja</h1>
                <form action="/admin/kiwanja/sell/{{$kiwanja->authority_id}}" class="flex flex-col gap-y-4"
                    method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="price">Selling Price</label>
                        <input type="number" name="price" placeholder="Selling Price"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
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
    <div class="bg-white shadow-md px-12 py-12 grid grid-cols-1 sm:grid-cols-3 gap-x-6 gap-y-12 ">
        <div>
            <h1>Kiwanja Identifier</h1>
            <h1 class="font-bold text-3xl">
                @php
                $kiwanja_detail = DB::table('authorities')->where('id', $kiwanja->authority_id)->first();
                $kiwanja_kijiji = DB::table('authorities')->where('id', $kiwanja_detail->parent_level_id)->first();
                $kiwanja_kata = DB::table('authorities')->where('id', $kiwanja_kijiji->parent_level_id)->first();
                $kiwanja_tarafa = DB::table('authorities')->where('id', $kiwanja_kata->parent_level_id)->first();
                $kiwanja_district = DB::table('authorities')->where('id', $kiwanja_tarafa->parent_level_id)->first();
                $kiwanja_owner = DB::table('users')->where('id', $kiwanja_detail->owner)->first();
                @endphp
                {{$kiwanja_detail->name}}
            </h1>
        </div>
        <div>
            <h1>Wilaya</h1>
            <h1 class="font-bold text-2xl">
                {{$kiwanja_district->name}}

            </h1>
        </div>
        <div>
            <h1>Tarafa</h1>
            <h1 class="font-bold text-2xl">
                {{$kiwanja_tarafa->name}}

            </h1>
        </div>
        <div>
            <h1>Kata</h1>
            <h1 class="font-bold text-2xl">
                {{$kiwanja_kata->name}}

            </h1>
        </div>
        <div>
            <h1>Kijiji</h1>
            <h1 class="font-bold text-2xl">
                {{$kiwanja_kijiji->name}}

            </h1>
        </div>
        <div>
            <h1>Owner</h1>
            <h1 class="font-bold text-2xl">
                @if ($kiwanja_detail->owner == 0)
                Government
                @else
                {{$kiwanja_owner->name}}
                @endif
            </h1>
        </div>
        <div>
            <h1>Conflict status</h1>
            <h1 class="font-bold text-2xl">
                @if ($kiwanja->conflict == true)
                <span class="text-red-500">

                    Has Conflict
                </span>
                @else
                <span class="text-green-500">

                    No conflict
                </span>
                @endif
            </h1>
        </div>
        <div>
            <h1>Sale status</h1>
            <h1 class="font-bold text-2xl">
                @if ($kiwanja->price == NULL)
                <span class="">

                    Not being sold
                </span>
                @else
                <span class="text-green-500">

                    Sold for TZS {{$kiwanja->price}}
                </span>
                @endif
            </h1>
        </div>
    </div>
</div>
@endsection
@extends('layouts.master')

@section('content')
{{-- {{$level}} --}}
@if ($level == 1)

<div>
    <div class="relative" x-show.transition="districtModal">
        <div class="bg-white rounded-lg ">


            <div class="mt-8 px-4 py-12 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">Edit District</h1>
                <form action="/authority/update/{{$item->id}}" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">District Name</label>
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="hidden" name="parent_level_id" value="{{$item->parent_level_id}}">
                        <input type="hidden" name="parent_level" value="{{$item->parent_level}}">
                        <input type="hidden" name="level" value="{{$item->level}}">
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="text" name="name" placeholder="District Name" value="{{$item->name}}"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endif
    @if ($level == 2)
    <div class="relative" x-show.transition="tarafaModal">
        <div class="bg-white rounded-lg py-12">


            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">Edit Taarifa</h1>
                <form action="/authority/update/{{$item->id}}" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Tarafa Name</label>
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="hidden" name="parent_level_id" value="{{$item->parent_level_id}}">
                        <input type="hidden" name="parent_level" value="{{$item->parent_level}}">
                        <input type="hidden" name="level" value="{{$item->level}}">
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="text" name="name" placeholder="District Name" value="{{$item->name}}"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    @if ($level == 3)
    <div class="relative" x-show.transition="kataModal">
        <div class="bg-white rounded-lg py-12">
            <span @click="kataModal = !kataModal" class="absolute top-2 right-4 text-4xl cursor-pointer">
                {{-- <i class="fa fa-close"></i> --}}
                &times;
            </span>

            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">Edit Kata</h1>
                <form action="/authority/update/{{$item->id}}" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Kata Name</label>
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="hidden" name="parent_level_id" value="{{$item->parent_level_id}}">
                        <input type="hidden" name="parent_level" value="{{$item->parent_level}}">
                        <input type="hidden" name="level" value="{{$item->level}}">
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="text" name="name" placeholder="District Name" value="{{$item->name}}"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endif

    @if ($level == 4)
    <div class="relative" x-show.transition="kijijiModal">
        <div class="bg-white rounded-lg py-12">


            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">Edit Kijiji</h1>
                <form action="/authority/update/{{$item->id}}" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Kijiji Name</label>
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="hidden" name="parent_level_id" value="{{$item->parent_level_id}}">
                        <input type="hidden" name="parent_level" value="{{$item->parent_level}}">
                        <input type="hidden" name="level" value="{{$item->level}}">
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="text" name="name" placeholder="District Name" value="{{$item->name}}"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endif

    @if ($level == 5)
    <div class="relative" x-show.transition="kiwanjaModal">
        <div class="bg-white rounded-lg py-12">


            <div class="mt-8 px-4 flex flex-col gap-y-2">
                <h1 class="font-bold text-xl text-center">Edit Kiwanja</h1>
                <form action="/authority/update/{{$item->id}}" class="flex flex-col gap-y-4" method="post">
                    {{ csrf_field() }}
                    <div class="">
                        <label for="name">Tarafa Name</label>
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="hidden" name="parent_level_id" value="{{$item->parent_level_id}}">
                        <input type="hidden" name="parent_level" value="{{$item->parent_level}}">
                        <input type="hidden" name="level" value="{{$item->level}}">
                        <input type="hidden" name="owner" value="{{$item->owner}}">
                        <input type="text" name="name" placeholder="District Name" value="{{$item->name}}"
                            class="w-full border border-solid border-gray-500 px-4 py-2 rounded-md">
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endif



</div>

@endsection
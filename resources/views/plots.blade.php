@extends('layouts.master')

@section('content')
<div class="bg-white shadow-md px-8 py-6 rounded-md">
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
                <th>Sale Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>
                    @if ($item->price != NULL)
                    Sold
                    @else
                    Not sold
                    @endif

                </td>
                <td>
                    <a href="/authority/{{$item->level}}/{{$item->id}}"
                        class="bg-green-500 shadow-md px-4 py-2 text-white rounded-md my-2">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
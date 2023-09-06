@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="table-container">
    
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Реден број во дневник</th>
                    <th>Име и Презиме</th>
                    <th>Домашно</th>
                    <th>Датум</th>
                </tr>
            </thead>
            <tbody>
                @foreach($domasnoRecords as $domasno)
                <tr>
                    <td>{{$domasno->ucenici_iducenici}}</td>
                    <td>{{$domasno->domasno}}</td>
                    <td>{{$domasno->istrazuvanje}}</td>
                    <td>{{$domasno->date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
</div>


@endsection
<style>
table {
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    border: 1px solid black; /* Add border to the entire table */
}

th{
    padding-left:10px !important;
}

/* Style the table rows */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Add responsive styles */
.table-container {
    overflow-x: auto;
}

.responsive-table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.responsive-table td, .responsive-table th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

/* Media query for responsiveness */
@media screen and (max-width: 600px) {
    .responsive-table {
        overflow-x: auto;
    }
}
</style>